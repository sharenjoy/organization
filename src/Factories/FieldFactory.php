<?php namespace Sharenjoy\Organization\Factories;

class FieldFactory extends AbstractFactory {

    public function field($name, $request = null, $type = null)
    {
        $namespace = 'Sharenjoy\Organization\Factories\Fields\\';

        $classname = $namespace.studly_case($name);

        if ( ! class_exists($classname))
        {
            throw new \InvalidArgumentException("This is wrong method of argument {$name}");
        }

        $fieldInstance = new $classname;

        if ($request) $fieldInstance->setRequest($request);

        if ($type) $fieldInstance->setType($type);

        return $fieldInstance->make();
    }

}