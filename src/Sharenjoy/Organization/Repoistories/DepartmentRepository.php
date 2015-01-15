<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\DepartmentInterface;

class DepartmentRepository extends OrganizationRepository implements DepartmentInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}