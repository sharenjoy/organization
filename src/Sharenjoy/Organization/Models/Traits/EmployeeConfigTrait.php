<?php namespace Sharenjoy\Organization\Models\Traits;

trait EmployeeConfigTrait {

    protected $eventItem = [
        'creating'    => ['user_id', 'sort'],
        'created'     => [],
        'updating'    => ['user_id'],
        'saved'       => [],
        'deleted'     => [],
    ];

    public $filterFormConfig = [];

    public $formConfig = [
        'title'       => ['order' => '20', 'inner-div-class'=>'col-sm-5'],
        'slug'        => ['order' => '30', 'inner-div-class'=>'col-sm-5'],
        'description' => ['order' => '40', 'inner-div-class'=>'col-sm-5'],
    ];

    public $previewFormConfig = [];
    public $createFormConfig  = [];
    public $updateFormConfig  = [];

    public $previewFormDeny   = [];
    public $createFormDeny    = [];
    public $updateFormDeny    = [];

}