<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => 'admin'], function()
{
    Route::controller('company'    , 'Sharenjoy\Organization\Controllers\CompanyController');
    Route::controller('department' , 'Sharenjoy\Organization\Controllers\DepartmentController');
    Route::controller('position'   , 'Sharenjoy\Organization\Controllers\PositionController');
    Route::controller('division'   , 'Sharenjoy\Organization\Controllers\DivisionController');
    Route::controller('role'       , 'Sharenjoy\Organization\Controllers\RoleController');
    Route::controller('employee'   , 'Sharenjoy\Organization\Controllers\EmployeeController');
});