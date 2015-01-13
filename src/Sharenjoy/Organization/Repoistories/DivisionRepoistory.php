<?php namespace Sharenjoy\Organization\Repoistories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\DivisionInterface;

class DivisionRepoistory extends OrganizationRepoistory implements DivisionInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}