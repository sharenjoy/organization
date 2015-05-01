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
	public function register()
    {
        // Merge config to allow user overwrite.
        $this->mergeConfigFrom(__DIR__.'/../config/organization.php', 'organization');

        // Binding a bunch of Provider
        $this->bindProvider();
    }

	protected function bindProvider()
	{
        $config = $this->app['config']->get('organization');
        
        $this->app->bind('Sharenjoy\Organization\Contracts\CompanyInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['company']['repository'](
                        new $config['company']['model'],
                        new $config['company']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        $this->app->bind('Sharenjoy\Organization\Contracts\DepartmentInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['department']['repository'](
                        new $config['department']['model'],
                        new $config['department']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        $this->app->bind('Sharenjoy\Organization\Contracts\PositionInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['position']['repository'](
                        new $config['position']['model'],
                        new $config['position']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        $this->app->bind('Sharenjoy\Organization\Contracts\DivisionInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['division']['repository'](
                        new $config['division']['model'],
                        new $config['division']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        $this->app->bind('Sharenjoy\Organization\Contracts\RoleInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['role']['repository'](
                        new $config['role']['model'],
                        new $config['role']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        $this->app->bind('Sharenjoy\Organization\Contracts\EmployeeInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['employee']['repository'](
                        new $config['employee']['model'],
                        new $config['employee']['validator']
                    );
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid repository driver.');
            }
        });

        // For provider
        $this->app->bind('Sharenjoy\Organization\Contracts\ProviderInterface', function() use ($config)
        {
            switch ($config['driver'])
            {
                case 'eloquent':
                    return new $config['provider'];
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid provider driver.');
            }
        });
	}

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $accessUrl = $this->app['config']->get('cmsharenjoy.access_url');

        $this->loadViewsFrom(__DIR__.'/../views', 'organization');

        $this->publishes([
            __DIR__.'/../config/organization.php' => config_path('organization.php'),
        ], 'config');

        $this->loadTranslationsFrom(__DIR__.'/../lang/', 'organization');

        $this->publishes([
            __DIR__ . '/../migrations' => base_path('/database/migrations')
        ], 'migration');

        // Make some alias
        $this->makeAlias();
        
        // Loading routes file
        include __DIR__ . '/routes.php';

        // Loading routes file
        include __DIR__ . '/helpers.php';
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

        // For organization
        AliasLoader::getInstance()->alias('Organization', 'Sharenjoy\Organization\Facades\Organization');
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
