<?php namespace Sharenjoy\Organization\Factories\Fields;

class Department {

    /**
     * This is the http request object
     * @var array
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function make($type)
    {
        return 'department';
    }

}