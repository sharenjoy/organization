<?php namespace Sharenjoy\Organization\Factories\Fields;

class Role extends AbstractField {

    protected function getOptions()
    {
        $items = \Role::showAll()->lists('name', 'slug');

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'role';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField().$this->getTheLastField();
    }

}