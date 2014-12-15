<?php namespace Sharenjoy\Organization\Controllers;

use Sharenjoy\Cmsharenjoy\Controllers\ObjectBaseController;
use Sharenjoy\Organization\Contracts\DepartmentInterface;

class DepartmentController extends ObjectBaseController {

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

    public function __construct(DepartmentInterface $handler)
    {
        $this->handler = $handler;
        parent::__construct();
    }

}