<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Organization Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the organization driver that will be utilized.
    | This drivers manages the retrieval and organization of the users
    | attempting to get access to protected areas of your application.
    |
    | Supported: "eloquent"
    |
    */

    'driver' => 'eloquent',

    /*
    |--------------------------------------------------------------------------
    | Company
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the company management component of Organization.
    |
    */

    'company' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Company',

        'handler' => 'Sharenjoy\Organization\Handlers\CompanyHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\CompanyValidator',

    ],

    /*
    |--------------------------------------------------------------------------
    | Department
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the department management component of Organization.
    |
    */

    'department' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Department',

        'handler' => 'Sharenjoy\Organization\Handlers\DepartmentHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\DepartmentValidator',

    ],

    /*
    |--------------------------------------------------------------------------
    | Position
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the position management component of Organization.
    |
    */

    'position' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Position',

        'handler' => 'Sharenjoy\Organization\Handlers\PositionHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\PositionValidator',

    ],

    /*
    |--------------------------------------------------------------------------
    | Division
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the division management component of Organization.
    |
    */

    'division' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Division',

        'handler' => 'Sharenjoy\Organization\Handlers\DivisionHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\DivisionValidator',

        /*
        |--------------------------------------------------------------------------
        | These are allowed model divisionable
        | key: The key is relationshop method of model
        | value: This is relationship
        | sample: 'employees' => 'Sharenjoy\Organization\Models\Employee'
        |--------------------------------------------------------------------------
        |
        */
       
        'morphed' => [

            'employees' => 'Sharenjoy\Organization\Models\Employee',

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Role
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the role management component of Organization.
    |
    */

    'role' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Role',

        'handler' => 'Sharenjoy\Organization\Handlers\RoleHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\RoleValidator',

        /*
        |--------------------------------------------------------------------------
        | These are allowed model roleable
        | key: The key is relationshop method of model
        | value: This is relationship
        | sample: 'Sharenjoy\Organization\Models\Employee'
        |--------------------------------------------------------------------------
        |
        */
       
        'morphed' => [

            'employees' => 'Sharenjoy\Organization\Models\Employee',

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Employee
    |--------------------------------------------------------------------------
    |
    | Configuration specific to the employee management component of Organization.
    |
    */

    'employee' => [

        /*
        |--------------------------------------------------------------------------
        | Model, Handler, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model' => 'Sharenjoy\Organization\Models\Employee',

        'handler' => 'Sharenjoy\Organization\Handlers\EmployeeHandler',
        
        'validator' => 'Sharenjoy\Organization\Validators\EmployeeValidator',

    ],

];
