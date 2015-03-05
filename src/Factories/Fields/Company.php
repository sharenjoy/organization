<?php namespace Sharenjoy\Organization\Factories\Fields;

class Company extends AbstractField {

    protected function getOptions()
    {
        $items = \Company::showAll()->lists('name', 'slug');

        return $this->combineOptions($items);
    }

    public function make()
    {
        return $this->getField();
    }

}