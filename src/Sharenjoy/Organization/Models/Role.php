<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Sharenjoy\Organization\Models\Traits\RoleConfigTrait;

class Role extends EloquentBaseModel {

    use RoleConfigTrait;
    
    protected $table = 'roles';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];



}