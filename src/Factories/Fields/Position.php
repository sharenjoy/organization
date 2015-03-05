<?php namespace Sharenjoy\Organization\Factories\Fields;

class Position extends AbstractField {

    protected function getOptions()
    {
        $items = \Position::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    public function make()
    {
        return $this->getField();
    }

}