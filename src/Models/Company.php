<?php namespace Sharenjoy\Organization\Models;

class Company extends Organization {

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
        'saved'       => ['syncToDepartments'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'departments' => ['order' => '30', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDepartments', 'args'=>['name'=>'departments[]']],
        'description' => ['order' => '40'],
    ];

    public function fieldDepartments($id)
    {
        return [
            'option' => $this->getLists('department'),
            'value'  => $this->find($id)->departments->implode('id', ',')
        ];
    }

    public function eventSyncToDepartments($key, $model)
    {
        return $this->syncMorph($model, 'departments');
    }
    
    public function departments()
    {
        return $this->belongsToMany($this->getOrganizationConfig('department.model'));
    }

    public function employees()
    {
        return $this->hasMany($this->getOrganizationConfig('employee.model'));
    }

}