<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseRepository;

abstract class OrganizationRepository extends EloquentBaseRepository {
    
    public function showBySlug($value)
    {
        return $this->model->where('slug', $value)->get();
    }

}