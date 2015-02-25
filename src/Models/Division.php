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
        'saved'       => ['syncToRoles', 'syncToEmployees', 'syncToCompanies', 'syncToDepartments'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'companies'   => ['order' => '25', 'type'=>'selectMultiList', 'create'=>[], 'update'=>[], 'relation'=>'fieldCompanies', 'args'=>['name'=>'companies[]']],
        'departments'   => ['order' => '30', 'type'=>'selectMultiList', 'create'=>[], 'update'=>[], 'relation'=>'fieldDepartments', 'args'=>['name'=>'departments[]']],
        'roles'       => ['order' => '40', 'type'=>'selectMultiList', 'create'=>[], 'update'=>[], 'relation'=>'fieldRoles', 'args'=>['name'=>'roles[]']],
        'employees'   => ['order' => '50', 'type'=>'selectMulti', 'create'=>[], 'update'=>[], 'relation'=>'fieldEmployees', 'args'=>['name'=>'employees[]']],
        'description' => ['order' => '60'],
    ];

    public function fieldRoles($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->roles->implode('id', ',') : '';
        $content['option'] = $this->getLists('role');
        
        return $content;
    }

    public function fieldCompanies($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->companies()->get()->implode('id', ',') : '';
        $content['option'] = $this->getLists('company');
        
        return $content;
    }

    public function fieldDepartments($id)
    {
        $content['value'] = $id != '' ? $this->find($id)->departments()->get()->implode('id', ',') : '';
        $content['option'] = $this->getLists('department');
        
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
        if ( ! isset(self::$inputData['roles'])) return;

        return $this->syncMorph($model, 'roles');
    }

    public function eventSyncToCompanies($key, $model)
    {
        if ( ! isset(self::$inputData['companies'])) return;

        return $this->syncMorph($model, 'companies');
    }

    public function eventSyncToDepartments($key, $model)
    {
        if ( ! isset(self::$inputData['departments'])) return;

        return $this->syncMorph($model, 'departments');
    }

    public function eventSyncToEmployees($key, $model)
    {
        if ( ! isset(self::$inputData['employees'])) return;

        return $this->syncMorph($model, 'employees');
    }

    public function roles()
    {
        return $this->belongsToMany($this->getOrganizationConfig('role.model'));
    }

    public static function withAllRelation()
    {
        $morphed = config('organization.division.morphed');
        
        $keys = array_keys($morphed);

        return static::with($keys);
    }

    public function scopeCrossed($query, $value)
    {
        return $value ? $query->where('crossed', $value) : $query;
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