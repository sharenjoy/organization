<?php namespace Sharenjoy\Organization;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class OrganizationServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('sharenjoy/organization');
        
		// Binding a bunch of Provider
        $this->bindProvider();

        // Make some alias
        $this->makeAlias();
	}

	protected function bindProvider()
	{
        $config = $this->app['config']->get('organization::config');
        
        $driver = $config['driver'];
        
        $this->app->bindShared('Sharenjoy\Organization\Contracts\CompanyInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['company']['repoistory'](
                        new $config['company']['model'],
                        new $config['company']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });

        $this->app->bindShared('Sharenjoy\Organization\Contracts\DepartmentInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['department']['repoistory'](
                        new $config['department']['model'],
                        new $config['department']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });

        $this->app->bindShared('Sharenjoy\Organization\Contracts\PositionInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['position']['repoistory'](
                        new $config['position']['model'],
                        new $config['position']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });

        $this->app->bindShared('Sharenjoy\Organization\Contracts\DivisionInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['division']['repoistory'](
                        new $config['division']['model'],
                        new $config['division']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });

        $this->app->bindShared('Sharenjoy\Organization\Contracts\RoleInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['role']['repoistory'](
                        new $config['role']['model'],
                        new $config['role']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });

        $this->app->bindShared('Sharenjoy\Organization\Contracts\EmployeeInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['employee']['repoistory'](
                        new $config['employee']['model'],
                        new $config['employee']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repoistory driver.');
            }
        });
	}

    /**
     * There are some useful alias
     * @return void
     */
    protected function makeAlias()
    {
    	// For company
        AliasLoader::getInstance()->alias('Company', 'Sharenjoy\Organization\Facades\Company');

        // For department
        AliasLoader::getInstance()->alias('Department', 'Sharenjoy\Organization\Facades\Department');

        // For position
        AliasLoader::getInstance()->alias('Position', 'Sharenjoy\Organization\Facades\Position');

        // For division
        AliasLoader::getInstance()->alias('Division', 'Sharenjoy\Organization\Facades\Division');

        // For role
        AliasLoader::getInstance()->alias('Role', 'Sharenjoy\Organization\Facades\Role');

        // For employee
        AliasLoader::getInstance()->alias('Employee', 'Sharenjoy\Organization\Facades\Employee');
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
