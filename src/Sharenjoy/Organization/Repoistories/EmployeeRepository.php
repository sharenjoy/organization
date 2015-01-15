<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\EmployeeInterface;

class EmployeeRepository extends OrganizationRepository implements EmployeeInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}