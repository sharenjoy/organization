<?php namespace Sharenjoy\Organization\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Sharenjoy\Cmsharenjoy\Core\Traits\CommonModelTrait;
use Sharenjoy\Cmsharenjoy\Core\Traits\EventModelTrait;
use Organization as OrganizationProvider;
use Eloquent;

abstract class Organization extends Eloquent {

    use CommonModelTrait;
    use EventModelTrait;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $modelConfig = null;

    protected function getOrganizationConfig($key)
    {
        if (is_null($this->modelConfig))
        {
            $this->modelConfig = config('organization');
        }

        $config = array_get($this->modelConfig, $key);

        if ( ! $config)
        {
            throw new \InvalidArgumentException('This is invalid argument');
        }

        return $config;
    }

    public function listQuery()
    {
        return $this->orderBy('sort');
    }

    /**
     * This is a method that fetch the lists data
     * from repository method for drop down select
     * @param  string $provider
     * @param  string $columnValue
     * @param  string $columnKey
     * @return array
     */
    public function getLists($provider, $columnValue = 'name', $columnKey = 'id')
    {
        return OrganizationProvider::repo($provider)->showAll()->lists($columnValue, $columnKey);
    }

    public function syncMorph($model, $morph)
    {
        if ( ! isset(self::$inputData[$morph])) return;

        if (empty(self::$inputData[$morph]))
        {
            return $model->$morph()->detach();
        }

        $data = explode(',', self::$inputData[$morph]);
        
        return $model->$morph()->sync($data);
    }
    
}