<?php namespace Sharenjoy\Organization\Factories\Fields;

class Role extends AbstractField {

    protected function getOptions()
    {
        $items = \Role::showAboveRelationshipLists($this->getFilterData());

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