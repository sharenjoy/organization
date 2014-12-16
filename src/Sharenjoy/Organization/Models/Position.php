<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\PositionConfigTrait;

class Position extends Organization {

    use PositionConfigTrait;
    
    protected $table = 'positions';

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

        return $this->belongsToMany($model, 'company_position', 'position_id', 'company_id');
    }

}