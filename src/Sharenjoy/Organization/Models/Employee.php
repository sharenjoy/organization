<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Sharenjoy\Organization\Models\Traits\EmployeeConfigTrait;

class Employee extends EloquentBaseModel {

    use EmployeeConfigTrait;
    
    protected $table = 'employees';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];



}