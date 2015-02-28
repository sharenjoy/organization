<?php namespace Sharenjoy\Organization\Models;

class Position extends Organization {
    
    protected $table = 'positions';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $eventItem = [
        'creating'    => ['sort'],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToEmployees'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'employees'   => ['order' => '30', 'type'=>'selectMulti', 'create'=>[], 'update'=>[], 'relation'=>'fieldEmployees', 'args'=>['name'=>'employees[]']],
        'description' => ['order' => '40'],
    ];

    public function fieldEmployees($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->employees()->get()->implode('id', ',') : '';
        $content['option'] = $this->getLists('employee');
        
        return $content;
    }

    public function eventSyncToEmployees($key, $model)
    {
        return $this->syncMorph($model, 'employees');
    }

    public static function withAllRelation()
    {
        return static::with(array_keys(config('organization.position.morphed')));
    }

    public function __call($method, $parameters)
    {
        $morphed = $this->getOrganizationConfig('position.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'positionable');
        }

        return parent::__call($method, $parameters);
    }

}