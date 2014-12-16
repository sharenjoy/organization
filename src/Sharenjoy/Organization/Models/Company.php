<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Organization\Models\Traits\CompanyConfigTrait;

class Company extends Organization {

    use CompanyConfigTrait;
    
    protected $table = 'companies';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'sort',
    ];

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