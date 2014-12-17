<?php namespace Sharenjoy\Organization\Handlers;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\RoleInterface;

class RoleHandler extends OrganizationHandler implements RoleInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}