<?php namespace Sharenjoy\Organization\Factories\Fields;

abstract class AbstractField {

    protected $type;

    protected $request;

    protected $filterData;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    public function setFilterData($data)
    {
        $this->filterData = $data;

        return $this;
    }

    protected function getFilterData()
    {
        if ($this->filterData)
        {
            return $this->filterData;
        }

        return [];
    }

    protected function combineOptions($items)
    {
        $options = '';

        foreach($items as $key => $value)
        {
            $options .= '<option value="'.$key.'">'.$value.'</option>';
        }

        return $options;
    }

    protected function getField()
    {
        if ($this->type)
        {
            $field = 'get'.studly_case($this->type).'Field';

            return $this->$field();
        }
        
        return $this->getSelectListField();
    }

    protected function getSelectField()
    {
        return '<select name="processors" class="form-control processors-field-select">
                  <option value="0" selected="selected">'.pick_trans('option.pleaseSelect').'</option>
                  '.$this->getOptions().'
                </select>';
    }

    protected function getSelectListField()
    {
        return '<select name="processors" class="select2 processors-field-selectlist" multiple="multiple">
                  '.$this->getOptions().'
                </select>';
    }

}