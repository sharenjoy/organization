<?php namespace Sharenjoy\Organization\Factories;

class FieldFactory extends AbstractFactory {

    public function field($field, $request, $type)
    {
        $namespace = 'Sharenjoy\Organization\Factories\Fields\\';

        $classname = $namespace.studly_case($field);

        if ( ! class_exists($classname))
        {
            throw new \InvalidArgumentException("This is wrong method of argument {$field}");
        }

        return (new $classname($request))->make($type);
    }

}