<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Organization\Contracts\DepartmentInterface;

class DepartmentController extends OrganizationController {

    protected $functionRules = [
        'list'   => true,
        'create' => true,
        'update' => true,
        'delete' => true,
        'order'  => true,
    ];

    protected $listConfig = [
        'name'         => ['name'=>'title',        'align'=>'',       'width'=>''   ],
        'slug'         => ['name'=>'slug',         'align'=>'',       'width'=>''   ],
        'created_at'   => ['name'=>'created',      'align'=>'center', 'width'=>'20%'],
    ];

    public function __construct(DepartmentInterface $repo)
    {
        $this->repo = $repo;
        
        parent::__construct();
    }

}