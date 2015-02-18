<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Organization\Contracts\CompanyInterface;

class CompanyController extends OrganizationController {

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

    public function __construct(CompanyInterface $repo)
    {
        $this->repo = $repo;
        
        parent::__construct();
    }

}