<?php namespace Sharenjoy\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class Division extends Facade {

    protected static function getFacadeAccessor()
    { 
        return 'Sharenjoy\Organization\Contracts\DivisionInterface'; 
    }

}