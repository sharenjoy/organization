<?php namespace Sharenjoy\Organization\Factories\Fields;

class Employee extends AbstractField {

    protected function getOptions()
    {
        $items = \Employee::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    public function make()
    {
        return $this->getField();
    }

}