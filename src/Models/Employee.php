<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\RoleableTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;

class Employee extends Organization {

    use RoleableTrait;
    use DivisionableTrait;
    use MorphBaseTrait;
    
    protected $table = 'employees';

    protected $fillable = [
        'company_id',
        'department_id',
        'position_id',
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
        'saved'       => ['syncToDivisions', 'syncToRoles'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'          => ['order' => '10'],
        'company_id'    => ['order' => '20', 'type'=>'select', 'method'=>'fieldCompany', 'pleaseSelect' => true],
        'department_id' => ['order' => '30', 'type'=>'select', 'method'=>'fieldDepartment', 'pleaseSelect' => true],
        'position_id'   => ['order' => '40', 'type'=>'select', 'method'=>'fieldPosition', 'pleaseSelect' => true],
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

    public function fieldPosition()
    {
        return ['option' => $this->getLists('position')];
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

    public function eventSyncToDivisions($key, $model)
    {
        if ( ! isset(self::$inputData['divisions'])) return;

        return $this->syncMorph($model, 'divisions');
    }

    public function eventSyncToRoles($key, $model)
    {
        if ( ! isset(self::$inputData['roles'])) return;

        return $this->syncMorph($model, 'roles');
    }

    public function getCompaniesLists()
    {
        return $this->getLists('company');
    }

    public function getDepartmentsLists()
    {
        return $this->getLists('department');
    }

    public function getPositionsLists()
    {
        return $this->getLists('position');
    }

    public function company()
    {
        return $this->belongsTo($this->getOrganizationConfig('company.model'));
    }

    public function department()
    {
        return $this->belongsTo($this->getOrganizationConfig('department.model'));
    }

    public function position()
    {
        return $this->belongsTo($this->getOrganizationConfig('position.model'));
    }

    public function listQuery()
    {
        return $this->orderBy('joined_at');
    }

}