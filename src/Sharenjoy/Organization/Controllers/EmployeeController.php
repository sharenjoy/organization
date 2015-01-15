<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Organization\Contracts\EmployeeInterface;

class EmployeeController extends OrganizationController {

    protected $functionRules = [
        'list'   => true,
        'create' => true,
        'update' => true,
        'delete' => true,
        'order'  => true,
    ];

    protected $listConfig = [
        'name'         => ['name'=>'name',         'align'=>'',       'width'=>''   ],
        'created_at'   => ['name'=>'created',      'align'=>'center', 'width'=>'20%'],
    ];

    public function __construct(EmployeeInterface $repo)
    {
        $this->repo = $repo;
        
        parent::__construct();
    }

}