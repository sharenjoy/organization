<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\EmployeeConfigTrait;

class Employee extends Organization {

    use EmployeeConfigTrait;
    
    protected $table = 'employees';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];

    public function company()
    {
        return $this->belongsTo($this->getConfig('company.model'));
    }

    public function department()
    {
        return $this->belongsTo($this->getConfig('department.model'));
    }

    public function position()
    {
        return $this->belongsTo($this->getConfig('position.model'));
    }

    public function roles()
    {
        return $this->belongsToMany($this->getConfig('role.model'), 'employee_role', 'employee_id', 'role_id');
    }

}