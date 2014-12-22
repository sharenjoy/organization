<?php namespace Sharenjoy\Organization\Models;

class Role extends Organization {
    
    protected $table = 'roles';

    public function divisions()
    {
        return $this->belongsToMany($this->getConfig('division.model'));
    }

    public function morphed(string $method)
    {
        $morphed = Config::get('organization::role.morphed');

        if (array_key_exists($method, $morphed))
        {
            return $this->morphedByMany($morphed[$method], 'roleable');
        }
    }

}