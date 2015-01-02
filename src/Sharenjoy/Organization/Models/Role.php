<?php namespace Sharenjoy\Organization\Models;

use Config;

class Role extends Organization {
    
    protected $table = 'roles';

    public function divisions()
    {
        return $this->belongsToMany($this->getOrganizationConfig('division.model'));
    }

    public static function withAllRelation()
    {
        $morphed = Config::get('organization::role.morphed');
        
        $keys = array_keys($morphed);

        return static::with($keys);
    }

    public function __call($method, $parameters)
    {
        $morphed = $this->getOrganizationConfig('role.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'roleable');
        }

        return parent::__call($method, $parameters);
    }

}