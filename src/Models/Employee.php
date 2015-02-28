<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\PositionableTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;
use Sharenjoy\Organization\Models\Traits\RoleableTrait;

class Employee extends Organization {

    use PositionableTrait;
    use DivisionableTrait;
    use RoleableTrait;
    use MorphBaseTrait;
    
    protected $table = 'employees';

    protected $fillable = [
        'company_id',
        'department_id',
        'name',
        'name_en',
        'email',
        'joinat_at',
    ];

    protected $dates = ['joined_at'];

    protected $eventItem = [
        'creating'    => [],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToPositions', 'syncToDivisions', 'syncToRoles'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'          => ['order' => '10'],
        'company_id'    => ['order' => '20', 'type'=>'select', 'method'=>'fieldCompany', 'pleaseSelect' => true],
        'department_id' => ['order' => '30', 'type'=>'select', 'method'=>'fieldDepartment', 'pleaseSelect' => true],
        'positions'     => ['order' => '40', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldpositions', 'args'=>['name'=>'positions[]']],
        'divisions'     => ['order' => '50', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDivisions', 'args'=>['name'=>'divisions[]']],
        'roles'         => ['order' => '60', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldRoles', 'args'=>['name'=>'roles[]']],
        'name_en'       => ['order' => '70'],
        'email'         => ['order' => '80'],
        'joined_at'     => ['order' => '90', 'type'=>'datepicker'],
    ];

    public function fieldCompany()
    {
        return ['option' => $this->getLists('company')];
    }

    public function fieldDepartment()
    {
        return ['option' => $this->getLists('department')];
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

    public function fieldRoles($id)
    {
        return [
            'option' => $this->getLists('role'),
            'value'  => $this->find($id)->roles->implode('id', ',')
        ];
    }

    public function eventSyncToPositions($key, $model)
    {
        return $this->syncMorph($model, 'positions');
    }

    public function eventSyncToDivisions($key, $model)
    {
        return $this->syncMorph($model, 'divisions');
    }

    public function eventSyncToRoles($key, $model)
    {
        return $this->syncMorph($model, 'roles');
    }

    public function grabCompaniesLists()
    {
        return $this->getLists('company');
    }

    public function grabDepartmentsLists()
    {
        return $this->getLists('department');
    }

    public function company()
    {
        return $this->belongsTo($this->getOrganizationConfig('company.model'));
    }

    public function department()
    {
        return $this->belongsTo($this->getOrganizationConfig('department.model'));
    }

    public function listQuery()
    {
        return $this->orderBy('joined_at');
    }

}