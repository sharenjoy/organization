<?php namespace Sharenjoy\Organization\Models;

class Department extends Organization {
    
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $eventItem = [
        'creating'    => ['sort'],
        'created'     => [],
        'updating'    => [],
        'saved'       => ['syncToCompanies'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'companies'   => ['order' => '30', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldCompanies', 'args'=>['name'=>'companies[]']],
        'description' => ['order' => '40'],
    ];

    public function fieldCompanies($id)
    {
        return [
            'option' => $this->getLists('company'),
            'value'  => $this->find($id)->companies->implode('id', ',')
        ];
    }

    public function eventSyncToCompanies($key, $model)
    {
        if ( ! isset(self::$inputData['companies'])) return;

        return $this->syncMorph($model, 'companies');
    }

    public function employees()
    {
        return $this->hasMany($this->getOrganizationConfig('employee.model'));
    }

    public function companies()
    {
        return $this->belongsToMany($this->getOrganizationConfig('company.model'));
    }

    public function divisions()
    {
        return $this->hasMany($this->getOrganizationConfig('division.model'));
    }

}