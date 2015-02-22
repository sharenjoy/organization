<?php namespace Sharenjoy\Organization;

use Sharenjoy\Organization\Contracts\ProviderInterface;

class OrganizationProvider implements ProviderInterface {

    /**
     * This is the provider that is allowed
     * @var array
     */
    protected $allowProvider;

    /**
     * This is the Factory object
     * @var object
     */
    protected $fieldInstance;

    public function __construct()
    {
        $this->allowProvider = config('organization.allowProvider');
    }

    protected function fetchInstance($key)
    {
        $interface = studly_case($key).'Interface';

        return app()->make("Sharenjoy\Organization\Contracts\\$interface");
    }

    private function checkTheGivenProvider($provider)
    {
        if ( ! in_array($provider, $this->allowProvider))
        {
            throw new \InvalidArgumentException('This is worng argument of provider');
        }
    }

    /**
     * To reveive the model instance from the given provider
     * @param  string $provider
     * @return Model
     */
    public function model($provider)
    {
        $this->checkTheGivenProvider($provider);
        
        $instance = $this->fetchInstance($provider);

        return $instance->getModel();
    }

    /**
     * To receive the repository instance from the given provider
     * @param  string $provider
     * @return Object
     */
    public function repo($provider)
    {
        $this->checkTheGivenProvider($provider);
        
        $instance = $this->fetchInstance($provider);

        return $instance;
    }

    /**
     * To fetch the form field with the related model
     * @param  string $field
     * @param  Request $request
     * @return string
     */
    public function field($field, $request, $type = null)
    {
        if ( ! $this->fieldInstance)
        {
            $this->fieldInstance = new Factories\FieldFactory;
        }

        return $this->fieldInstance->field($field, $request, $type);
    }

}