<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Cmsharenjoy\Controllers\ObjectBaseController;
use View, Config;

class OrganizationController extends ObjectBaseController {

    public function __construct()
    {
        parent::__construct();
    }

    protected function setupLayout()
    {
        $action = $this->onAction;

        // If action equat sort so that set the action to index
        $action = $this->onMethod == 'get-sort' ? 'index' : $action;
        
        // Get reop directory from config
        $commonLayout = Config::get('cmsharenjoy::app.commonLayoutDirectory');
        
        $pathA = $this->onController.'.'.$action;
        $pathB = $commonLayout.'.'.$action;

        if (View::exists($this->accessUrl.'.'.$pathA))
        {
            $this->layout = View::make($this->accessUrl.'.'.$pathA);
        }
        elseif (View::exists('organization::'.$pathA))
        {
            $this->layout = View::make('organization::'.$pathA);
        }
        else if(View::exists($this->accessUrl.'.'.$pathB))
        {
            $this->layout = View::make($this->accessUrl.'.'.$pathB);
        }
        else if(View::exists('organization::'.$pathB))
        {
            $this->layout = View::make('organization::'.$pathB);
        }
        else if(View::exists('cmsharenjoy::'.$pathB))
        {
            $this->layout = View::make('cmsharenjoy::'.$pathB);
        }
    }

}