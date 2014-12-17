<?php namespace Sharenjoy\Organization\Models;

class Department extends Organization {
    
    protected $table = 'departments';

    public function employees()
    {
        return $this->hasMany($this->getConfig('employee.model'));
    }

    public function companies()
    {
        $model = $this->getConfig('company.model');

        return $this->belongsToMany($model, 'company_department', 'department_id', 'company_id');
    }

}