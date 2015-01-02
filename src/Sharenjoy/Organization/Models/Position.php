<?php namespace Sharenjoy\Organization\Models;

class Position extends Organization {
    
    protected $table = 'positions';

    public function employees()
    {
        return $this->hasMany($this->getOrganizationConfig('employee.model'));
    }

    public function companies()
    {
        return $this->belongsToMany($this->getOrganizationConfig('company.model'));
    }

}