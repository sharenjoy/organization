<?php namespace Sharenjoy\Organization\Validators;

use Sharenjoy\Cmsharenjoy\Service\Validation\AbstractLaravelValidator;

class EmployeeValidator extends AbstractLaravelValidator {

    public $unique = [];

    public $rules = [
        'company_id'    => 'required|not_in:0',
        'department_id' => 'required|not_in:0',
        'name'          => 'required',
        'name_en'       => 'required',
        'email'         => 'required|email',
        'joined_at'     => 'required',
    ];

}