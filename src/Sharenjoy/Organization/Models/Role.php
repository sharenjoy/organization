<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\RoleConfigTrait;

class Role extends Organization {

    use RoleConfigTrait;
    
    protected $table = 'roles';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];

    public function employees()
    {
        return $this->belongsToMany($this->getConfig('employee.model'), 'employee_role', 'role_id', 'employee_id');
    }

}