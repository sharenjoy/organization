<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Cmsharenjoy\Http\Controllers\ObjectBaseController;

class OrganizationController extends ObjectBaseController {

    public function __construct()
    {
        parent::__construct();
    }

    protected function getPackageInfo()
    {
        return config('organization.package');
    }

}