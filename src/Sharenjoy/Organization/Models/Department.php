<?php namespace Sharenjoy\Organization\Models;

class Department extends Organization {
    
    protected $table = 'departments';

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