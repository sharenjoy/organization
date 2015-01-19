<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\MorphBaseTrait;
use Sharenjoy\Organization\Models\Traits\RoleableTrait;
use Sharenjoy\Organization\Models\Traits\DivisionableTrait;

class Employee extends Organization {

    use RoleableTrait;
    use DivisionableTrait;
    use MorphBaseTrait;
    
    protected $table = 'employees';

    public function company()
    {
        return $this->belongsTo($this->getOrganizationConfig('company.model'));
    }

    public function department()
    {
        return $this->belongsTo($this->getOrganizationConfig('department.model'));
    }

    public function position()
    {
        return $this->belongsTo($this->getOrganizationConfig('position.model'));
    }

    public function listQuery()
    {
        return $this->orderBy('joined_at');
    }

}