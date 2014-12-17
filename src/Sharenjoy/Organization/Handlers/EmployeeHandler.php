<?php namespace Sharenjoy\Organization\Handlers;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\EmployeeInterface;

class EmployeeHandler extends OrganizationHandler implements EmployeeInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}