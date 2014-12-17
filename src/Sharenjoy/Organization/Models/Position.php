<?php namespace Sharenjoy\Organization\Models;

class Position extends Organization {
    
    protected $table = 'positions';

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