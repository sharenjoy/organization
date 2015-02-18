<?php namespace Sharenjoy\Organization;

use Sharenjoy\Organization\Contracts\ProviderInterface;
use App, Config;

class OrganizationProvider implements ProviderInterface {

    protected $allowProvider;

    public function __construct()
    {
        $this->allowProvider = Config::get('organization.allowProvider');
    }

    protected function fetchInstance($key)
    {
        $interface = studly_case($key).'Interface';

        return App::make("Sharenjoy\Organization\Contracts\\$interface");
    }

    private function checkTheGivenProvider($provider)
    {
        if ( ! in_array($provider, $this->allowProvider))
        {
            throw new \InvalidArgumentException('This is worng argument of provider');
        }
    }

    public function model($provider)
    {
        $this->checkTheGivenProvider($provider);
        
        $instance = $this->fetchInstance($provider);

        return $instance->getModel();
    }

    public function repo($provider)
    {
        $this->checkTheGivenProvider($provider);
        
        $instance = $this->fetchInstance($provider);

        return $instance;
    }

}