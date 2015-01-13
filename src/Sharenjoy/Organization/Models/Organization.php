<?php namespace Sharenjoy\Organization\Models;

use Sharenjoy\Cmsharenjoy\Core\Traits\CommonModelTrait;
use Eloquent, Config;

abstract class Organization extends Eloquent {

    use CommonModelTrait;
    
    protected static $modelConfig = null;

    protected function getOrganizationConfig($key)
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

    public function listQuery()
    {
        return $this->orderBy('created_at', 'desc');
    }
    
}