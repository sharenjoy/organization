<?php namespace Sharenjoy\Organization\Factories\Fields;

class Division extends AbstractField {

    protected function getOptions()
    {
        $data = $this->fetchFlowerProcessorsSession() ?: [];

        $items = \Division::showAboveRelationshipLists($data);

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