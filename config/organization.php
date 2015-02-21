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
    | Package name
    |--------------------------------------------------------------------------
    |
    | This is package name that share to language or view
    |
    */

    'package' => 'organization',

    /*
    |--------------------------------------------------------------------------
    | Provider name and allow provider
    |--------------------------------------------------------------------------
    |
    | This is provider class name and
    | allow the provider name
    |
    */

    'provider' => 'Sharenjoy\Organization\OrganizationProvider',

    'allowProvider' => [

        /*
        |--------------------------------------------------------------------------
        | To check the allowing provider in the OrganizationProvider
        |--------------------------------------------------------------------------
        |
        */
       
        'company', 'department', 'position', 'role', 'division', 'employee'
    ],

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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Company',
        
        'repository' => 'Sharenjoy\Organization\Repositories\CompanyRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\CompanyValidator',

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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Department',
        
        'repository' => 'Sharenjoy\Organization\Repositories\DepartmentRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\DepartmentValidator',

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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Position',
        
        'repository' => 'Sharenjoy\Organization\Repositories\PositionRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\PositionValidator',

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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Division',
        
        'repository' => 'Sharenjoy\Organization\Repositories\DivisionRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\DivisionValidator',

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

            'companies' => 'Sharenjoy\Organization\Models\Company',
            'departments' => 'Sharenjoy\Organization\Models\Department',
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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Role',
        
        'repository' => 'Sharenjoy\Organization\Repositories\RoleRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\RoleValidator',

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
        | Model, Repoistory, Validator
        |--------------------------------------------------------------------------
        |
        */

        'model'      => 'Sharenjoy\Organization\Models\Employee',
        
        'repository' => 'Sharenjoy\Organization\Repositories\EmployeeRepository',
        
        'validator'  => 'Sharenjoy\Organization\Validators\EmployeeValidator',

    ],

];
