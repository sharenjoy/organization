<?php namespace Sharenjoy\Organization\Repoistories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\EmployeeInterface;

class EmployeeRepoistory extends OrganizationRepoistory implements EmployeeInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}