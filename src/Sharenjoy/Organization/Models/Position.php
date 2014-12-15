<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Sharenjoy\Organization\Models\Traits\PositionConfigTrait;

class Position extends EloquentBaseModel {

    use PositionConfigTrait;
    
    protected $table = 'positions';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];


}