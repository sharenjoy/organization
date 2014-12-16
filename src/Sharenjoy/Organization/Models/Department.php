<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\DepartmentConfigTrait;

class Department extends Organization {

    use DepartmentConfigTrait;
    
    protected $table = 'departments';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];

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