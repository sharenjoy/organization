<?php namespace Sharenjoy\Organization\Models;

class Division extends Organization {
    
    protected $table = 'divisions';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $eventItem = [
        'creating'    => ['sort'],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToRoles', 'syncToEmployees'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'roles'       => ['order' => '40', 'type'=>'selectMultiList', 'create'=>[], 'update'=>[], 'relation'=>'fieldRoles', 'args'=>['name'=>'roles[]']],
        'employees'   => ['order' => '50', 'type'=>'selectMulti', 'create'=>[], 'update'=>[], 'relation'=>'fieldEmployees', 'args'=>['name'=>'employees[]']],
        'description' => ['order' => '60'],
    ];

    public function fieldRoles($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->roles()->get()->implode('id', ',') : '';
        $content['option'] = $this->getLists('role');
        
        return $content;
    }

    public function fieldEmployees($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->employees()->get()->implode('id', ',') : '';
        $content['option'] = $this->getLists('employee');
        
        return $content;
    }

    public function eventSyncToRoles($key, $model)
    {
        return $this->syncMorph($model, 'roles');
    }

    public function eventSyncToEmployees($key, $model)
    {
        return $this->syncMorph($model, 'employees');
    }

    public static function withAllRelation()
    {
        return static::with(array_keys(config('organization.division.morphed')));
    }

    public function __call($method, $parameters)
    {
        $morphed = $this->getOrganizationConfig('division.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'divisionable');
        }

        return parent::__call($method, $parameters);
    }

}