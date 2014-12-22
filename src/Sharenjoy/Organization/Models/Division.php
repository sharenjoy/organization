<?php namespace Sharenjoy\Organization\Models;

use Config;

class Division extends Organization {
    
    protected $table = 'divisions';

    public function department()
    {
        return $this->belongsTo($this->getConfig('department.model'));
    }

    public function roles()
    {
        return $this->belongsToMany($this->getConfig('role.model'));
    }

    public function morphed(string $method)
    {
        $morphed = Config::get('organization::division.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'divisionable');
        }
    }

    public function scopeCrossed($query, $value)
    {
        return $value ? $query->where('crossed', $value) : $query;
    }

}