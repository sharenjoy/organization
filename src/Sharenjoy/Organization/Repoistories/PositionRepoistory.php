<?php namespace Sharenjoy\Organization\Repoistories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\PositionInterface;

class PositionRepoistory extends OrganizationRepoistory implements PositionInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}