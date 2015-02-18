<?php namespace Sharenjoy\Organization\Validators;

use Sharenjoy\Cmsharenjoy\Service\Validation\AbstractLaravelValidator;

class PositionValidator extends AbstractLaravelValidator {

    public $unique = ['slug'];

    public $rules = [
        'name' => 'required',
        'slug' => 'required|alpha|unique:positions,slug',
    ];

}