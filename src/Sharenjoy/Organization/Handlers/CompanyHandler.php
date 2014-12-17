<?php namespace Sharenjoy\Organization\Handlers;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\CompanyInterface;

class CompanyHandler extends OrganizationHandler implements CompanyInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}