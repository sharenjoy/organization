<?php namespace Sharenjoy\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class Company extends Facade {

    protected static function getFacadeAccessor()
    { 
        return 'Sharenjoy\Organization\Contracts\CompanyInterface'; 
    }

}