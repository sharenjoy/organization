<?php namespace Sharenjoy\Organization\Models;

class Company extends Organization {
    
    protected $table = 'companies';

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