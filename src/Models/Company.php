<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;

class Company extends Organization {

    use DivisionableTrait;
    use MorphBaseTrait;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $eventItem = [
        'creating'    => ['sort'],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToDepartments', 'syncToPositions', 'syncToDivisions'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'departments' => ['order' => '30', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDepartments', 'args'=>['name'=>'departments[]']],
        'positions'   => ['order' => '35', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldPositions', 'args'=>['name'=>'positions[]']],
        'divisions'     => ['order' => '40', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDivisions', 'args'=>['name'=>'divisions[]']],
        'description' => ['order' => '50'],
    ];

    public function fieldDepartments($id)
    {
        return [
            'option' => $this->getLists('department'),
            'value'  => $this->find($id)->departments->implode('id', ',')
        ];
    }

    public function fieldPositions($id)
    {
        return [
            'option' => $this->getLists('position'),
            'value'  => $this->find($id)->positions->implode('id', ',')
        ];
    }

    public function fieldDivisions($id)
    {
        return [
            'option' => $this->getLists('division'),
            'value'  => $this->find($id)->divisions->implode('id', ',')
        ];
    }

    public function eventSyncToDepartments($key, $model)
    {
        if ( ! isset(self::$inputData['departments'])) return;

        return $this->syncMorph($model, 'departments');
    }

    public function eventSyncToPositions($key, $model)
    {
        if ( ! isset(self::$inputData['positions'])) return;

        return $this->syncMorph($model, 'positions');
    }

    public function eventSyncToDivisions($key, $model)
    {
        if ( ! isset(self::$inputData['divisions'])) return;

        return $this->syncMorph($model, 'divisions');
    }
    
    public function departments()
    {
        return $this->belongsToMany($this->getOrganizationConfig('department.model'));
    }

    public function positions()
    {
        return $this->belongsToMany($this->getOrganizationConfig('position.model'));
    }

    public function employees()
    {
        return $this->hasMany($this->getOrganizationConfig('employee.model'));
    }

}