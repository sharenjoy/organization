<?php namespace Sharenjoy\Organization\Factories\Fields;

class Division extends AbstractField {

    protected function getOptions()
    {
        $items = \Division::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    public function make()
    {
        return $this->getField();
    }

}