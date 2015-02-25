<?php namespace Sharenjoy\Organization\Factories\Fields;

class Department extends AbstractField {

    protected function getOptions()
    {
        $data = $this->fetchFlowerProcessorsSession() ?: [];

        $items = \Department::showAboveRelationshipLists($data);

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'department';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField();
    }

}