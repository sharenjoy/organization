<?php namespace Sharenjoy\Organization\Factories\Fields;

class Employee extends AbstractField {

    protected function getOptions()
    {
        $items = \Employee::showAll()->lists('name', 'id');

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'employee';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField().$this->getTheLastField();
    }

}