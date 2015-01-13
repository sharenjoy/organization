<?php namespace Sharenjoy\Organization\Repoistories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\CompanyInterface;

class CompanyRepoistory extends OrganizationRepoistory implements CompanyInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}