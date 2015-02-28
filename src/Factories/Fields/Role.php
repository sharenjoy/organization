<?php namespace Sharenjoy\Organization\Factories\Fields;

class Role extends AbstractField {

    protected function getOptions()
    {
        $data = $this->fetchFlowerProcessorsSession() ?: [];

        $items = \Role::showAboveRelationshipLists($data);

        return $this->combineOptions($items);
    }

    protected function getLastOne()
    {
        return 'role';
    }

    public function make()
    {
        return $this->getField().$this->getLastOneField().$this->getThisIsValueField().$this->getTheLastField();
    }

}