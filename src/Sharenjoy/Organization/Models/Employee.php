<?php namespace Sharenjoy\Organization\Models;

use SharenjoyOrganization\Models\Traits\RoleableTrait;
use SharenjoyOrganization\Models\Traits\DivisionableTrait;

class Employee extends Organization {

    use RoleableTrait;
    use DivisionableTrait;
    
    protected $table = 'employees';

    public function company()
    {
        return $this->belongsTo($this->getConfig('company.model'));
    }

    public function department()
    {
        return $this->belongsTo($this->getConfig('department.model'));
    }

    public function position()
    {
        return $this->belongsTo($this->getConfig('position.model'));
    }

}