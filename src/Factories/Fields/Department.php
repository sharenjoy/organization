<?php namespace Sharenjoy\Organization\Factories\Fields;

class Department extends AbstractField {

    protected function getOptions()
    {
        $items = \Department::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    public function make()
    {
        return $this->getField();
    }

}