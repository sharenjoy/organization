<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;

class Department extends Organization {

    use DivisionableTrait;
    use MorphBaseTrait;
    
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
        'saved'       => ['syncToCompanies', 'syncToDivisions'],
        'deleted'     => [],
    ];
    
    public $filterFormConfig = [];
    
    public $formConfig = [
        'name'        => ['order' => '10'],
        'slug'        => ['order' => '20', 'update'=>['args'=>['readonly'=>'readonly']]],
        'companies'   => ['order' => '30', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldCompanies', 'args'=>['name'=>'companies[]']],
        'divisions'     => ['order' => '40', 'type'=>'selectMultiList', 'create'=>'deny', 'update'=>[], 'relation'=>'fieldDivisions', 'args'=>['name'=>'divisions[]']],
        'description' => ['order' => '50'],
    ];

    public function fieldCompanies($id)
    {
        return [
            'option' => $this->getLists('company'),
            'value'  => $this->find($id)->companies->implode('id', ',')
        ];
    }

    public function fieldDivisions($id)
    {
        return [
            'option' => $this->getLists('division'),
            'value'  => $this->find($id)->divisions->implode('id', ',')
        ];
    }

    public function eventSyncToCompanies($key, $model)
    {
        if ( ! isset(self::$inputData['companies'])) return;

        return $this->syncMorph($model, 'companies');
    }

    public function eventSyncToDivisions($key, $model)
    {
        if ( ! isset(self::$inputData['divisions'])) return;

        return $this->syncMorph($model, 'divisions');
    }

    public function employees()
    {
        return $this->hasMany($this->getOrganizationConfig('employee.model'));
    }

    public function companies()
    {
        return $this->belongsToMany($this->getOrganizationConfig('company.model'));
    }

}