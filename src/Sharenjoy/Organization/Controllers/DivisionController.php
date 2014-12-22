<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Organization\Contracts\DivisionInterface;

class DivisionController extends OrganizationController {

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

    public function __construct(DivisionInterface $handler)
    {
        $this->handler = $handler;
        parent::__construct();
    }

}