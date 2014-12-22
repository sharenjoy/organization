<?php namespace Sharenjoy\Organization\Handlers;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\DivisionInterface;

class DivisionHandler extends OrganizationHandler implements DivisionInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}