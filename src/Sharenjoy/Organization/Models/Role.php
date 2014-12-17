<?php namespace Sharenjoy\Organization\Models;

class Role extends Organization {
    
    protected $table = 'roles';

    public function employees()
    {
        return $this->belongsToMany($this->getConfig('employee.model'), 'employee_role', 'role_id', 'employee_id');
    }

}