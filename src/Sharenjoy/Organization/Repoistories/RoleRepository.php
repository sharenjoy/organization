<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\RoleInterface;

class RoleRepository extends OrganizationRepository implements RoleInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}