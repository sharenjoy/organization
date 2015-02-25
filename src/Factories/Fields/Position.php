<?php namespace Sharenjoy\Organization\Factories\Fields;

class Position extends AbstractField {

    protected function getOptions()
    {
        $data = $this->fetchFlowerProcessorsSession() ?: [];

        $items = \Position::showAboveRelationshipLists($data);

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