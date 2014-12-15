<?php namespace Sharenjoy\Organization\Validators;

use Sharenjoy\Cmsharenjoy\Service\Validation\AbstractLaravelValidator;

class DepartmentValidator extends AbstractLaravelValidator {

    public $unique = ['slug'];

    public $rules = [
        'title'     => 'required|unique:posts,title',
        'content'   => 'required'
    ];

}