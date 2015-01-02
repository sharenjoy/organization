<?php namespace Sharenjoy\Organization\Models;

use Config;

class Division extends Organization {
    
    protected $table = 'divisions';

    public function department()
    {
        return $this->belongsTo($this->getOrganizationConfig('department.model'));
    }

    public function roles()
    {
        return $this->belongsToMany($this->getOrganizationConfig('role.model'));
    }

    public static function withAllRelation()
    {
        $morphed = Config::get('organization::division.morphed');
        
        $keys = array_keys($morphed);

        return static::with($keys);
    }

    public function scopeCrossed($query, $value)
    {
        return $value ? $query->where('crossed', $value) : $query;
    }

    public function __call($method, $parameters)
    {
        $morphed = $this->getOrganizationConfig('division.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'divisionable');
        }

        return parent::__call($method, $parameters);
    }

}