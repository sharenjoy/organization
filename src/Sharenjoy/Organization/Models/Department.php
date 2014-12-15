<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Sharenjoy\Organization\Models\Traits\DepartmentConfigTrait;

class Department extends EloquentBaseModel {

    use DepartmentConfigTrait;
    
    protected $table = 'departments';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];


}