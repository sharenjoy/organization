<?php namespace Sharenjoy\Organization\Handlers;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\DepartmentInterface;

class DepartmentHandler extends OrganizationHandler implements DepartmentInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}