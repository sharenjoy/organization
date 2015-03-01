<?php namespace Sharenjoy\Organization\Factories\Fields;

class Position extends AbstractField {

    protected function getOptions()
    {
        $items = \Position::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'position';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField().$this->getTheLastField();
    }

}