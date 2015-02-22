<?php namespace Sharenjoy\Organization\Factories\Fields;

class Company {

    /**
     * This is the http request object
     * @var array
     */
    protected $request;

    protected $options = [
        '0'          => 'option.pleaseSelect',
        'all'        => 'all_employee',
        'department' => 'organization::organization.department',
        'position'   => 'organization::organization.position',
        'role'       => 'organization::organization.role',
        'division'   => 'organization::organization.division',
        'employee'   => 'organization::organization.employee'
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    protected function getOptions()
    {
        $config = \Company::showAll()->lists('name', 'id');

        $options = '';

        foreach($config as $key => $value)
        {
            $options .= '<option value="'.$key.'">'.$value.'</option>';
        }

        return $options;
    }

    protected function select()
    {
        return '<select name="processors" class="form-control processors-field">
                  '.$this->getOptions().'
                </select>';
    }

    public function make($type)
    {
        if (is_null($type))
        {
            return $this->select();
        }

        $method = camel_case($type);

        if ( ! method_exists($this, $method))
        {
            throw new \InvalidArgumentException("This is wrong argument {$type}");
        }

        return $this->$method();
    }

}