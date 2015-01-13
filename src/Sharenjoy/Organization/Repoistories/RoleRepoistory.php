<?php namespace Sharenjoy\Organization\Repoistories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\RoleInterface;

class RoleRepoistory extends OrganizationRepoistory implements RoleInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}