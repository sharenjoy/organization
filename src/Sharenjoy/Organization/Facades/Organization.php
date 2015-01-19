<?php namespace Sharenjoy\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class Organization extends Facade {

    protected static function getFacadeAccessor()
    { 
        return 'Sharenjoy\Organization\Contracts\ProviderInterface'; 
    }

}