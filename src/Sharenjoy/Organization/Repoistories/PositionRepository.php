<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\PositionInterface;

class PositionRepository extends OrganizationRepository implements PositionInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }


}