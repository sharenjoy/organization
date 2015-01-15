<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Cmsharenjoy\Controllers\ObjectBaseController;
use View, Config;

class OrganizationController extends ObjectBaseController {

    public function __construct()
    {
        parent::__construct();
    }

    protected function getPackageInfo()
    {
        return Config::get('organization::package');
    }

}