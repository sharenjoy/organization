<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;

class Role extends Organization {
    
    use DivisionableTrait;
    use MorphBaseTrait;

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
            'value'  => $this->find($id)->divisions()->get()->implode('id', ',')
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
        return $this->syncMorph($model, 'divisions');
    }

    public function eventSyncToEmployees($key, $model)
    {
        return $this->syncMorph($model, 'employees');
    }

    public static function withAllRelation()
    {
        return static::with(array_keys(config('organization.role.morphed')));
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