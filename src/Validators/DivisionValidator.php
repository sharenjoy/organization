<?php namespace Sharenjoy\Organization\Validators;

use Sharenjoy\Cmsharenjoy\Service\Validation\AbstractLaravelValidator;

class DivisionValidator extends AbstractLaravelValidator {

    public $unique = ['slug'];

    public $rules = [
        'name' => 'required',
        'slug' => 'required|alpha|unique:divisions,slug',
    ];

}