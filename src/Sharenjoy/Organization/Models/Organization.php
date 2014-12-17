<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\EloquentBaseModel;
use Config;

abstract class Organization extends EloquentBaseModel {
    
    protected static $modelConfig = null;

    protected function getConfig($key)
    {
        if (is_null(static::$modelConfig))
        {
            static::$modelConfig = Config::get('organization::config');
        }

        $config = array_get(static::$modelConfig, $key);

        if ( ! $config)
        {
            throw new \InvalidArgumentException('This is invalid argument');
        }

        return $config;
    }
    
}