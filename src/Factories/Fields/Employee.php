<?php namespace Sharenjoy\Organization\Factories\Fields;

class Employee extends AbstractField {

    protected function getOptions()
    {
        $data = $this->fetchFlowerProcessorsSession() ?: [];

        $items = \Employee::showAboveRelationshipLists($data);

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'employee';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField().$this->getTheLastField();
    }

}