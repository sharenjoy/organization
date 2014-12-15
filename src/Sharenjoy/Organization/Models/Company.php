<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Sharenjoy\Organization\Models\Traits\CompanyConfigTrait;

class Company extends EloquentBaseModel {

    use CompanyConfigTrait;
    
    protected $table = 'companies';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];



}