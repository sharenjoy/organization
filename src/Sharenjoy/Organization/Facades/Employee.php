<?php namespace Sharenjoy\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class Employee extends Facade {

    protected static function getFacadeAccessor()
    { 
        return 'Sharenjoy\Organization\Contracts\EmployeeInterface'; 
    }

}