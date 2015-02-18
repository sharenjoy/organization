<?php namespace Sharenjoy\Organization\Models;

use Config;

class Role extends Organization {
    
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $eventItem = [
        'creating'    => ['sort'],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToDivisions', 'syncToEmployees'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'divisions'   => ['order' => '30', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDivisions', 'args'=>['name'=>'divisions[]']],
        'employees'   => ['order' => '40', 'type'=>'selectMulti', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldEmployees', 'args'=>['name'=>'employees[]']],
        'description' => ['order' => '50'],
    ];

    public function fieldDivisions($id)
    {
        return [
            'option' => $this->getLists('division'),
            'value'  => $this->find($id)->divisions->implode('id', ',')
        ];
    }

    public function fieldEmployees($id)
    {
        return [
            'option' => $this->getLists('employee'),
            'value'  => $this->find($id)->employees()->get()->implode('id', ',')
        ];
    }

    public function eventSyncToDivisions($key, $model)
    {
        if ( ! isset(self::$inputData['divisions'])) return;

        return $this->syncMorph($model, 'divisions');
    }

    public function eventSyncToEmployees($key, $model)
    {
        if ( ! isset(self::$inputData['employees'])) return;

        return $this->syncMorph($model, 'employees');
    }

    public function divisions()
    {
        return $this->belongsToMany($this->getOrganizationConfig('division.model'));
    }

    public static function withAllRelation()
    {
        $morphed = Config::get('organization.role.morphed');
        
        $keys = array_keys($morphed);

        return static::with($keys);
    }

    public function __call($method, $parameters)
    {
        $morphed = $this->getOrganizationConfig('role.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'roleable');
        }

        return parent::__call($method, $parameters);
    }

}