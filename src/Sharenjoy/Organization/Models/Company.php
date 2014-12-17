<?php namespace Sharenjoy\Organization\Models;

class Company extends Organization {
    
    protected $table = 'companies';

    public function departments()
    {
        $model = $this->getConfig('department.model');

        return $this->belongsToMany($model, 'company_department', 'company_id', 'department_id');
    }

    public function positions()
    {
        $model = $this->getConfig('position.model');

        return $this->belongsToMany($model, 'company_position', 'company_id', 'position_id');
    }

}