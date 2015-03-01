<?php namespace Sharenjoy\Organization\Factories\Fields;

class Division extends AbstractField {

    protected function getOptions()
    {
        $items = \Division::showAboveRelationshipLists($this->getFilterData());

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'division';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField();
    }

}