<?php namespace Sharenjoy\Organization\Validators;

use Sharenjoy\Cmsharenjoy\Service\Validation\AbstractLaravelValidator;

class CompanyValidator extends AbstractLaravelValidator {

    public $unique = ['slug'];

    public $rules = [
        'name'      => 'required',
        'full_name' => 'required',
        'slug'      => 'required|alpha|unique:companies,slug',
    ];

}