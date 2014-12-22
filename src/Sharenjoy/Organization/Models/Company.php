<?php namespace Sharenjoy\Organization\Models;

class Company extends Organization {
    
    protected $table = 'companies';

    public function departments()
    {
        return $this->belongsToMany($this->getConfig('department.model'));
    }

    public function positions()
    {
        return $this->belongsToMany($this->getConfig('position.model'));
    }

    public function employees()
    {
        return $this->hasMany($this->getConfig('employee.model'));
    }

}