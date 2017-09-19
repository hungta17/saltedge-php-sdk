<?php
/**
 * Created by PhpStorm.
 * User: Hung Tran
 * Date: 2017-09-19
 * Time: 3:54 PM
 */
namespace Rainmakerlabs\Saltedge;

use Illuminate\Support\ServiceProvider;

class SaltedgeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app['SaltedgePublic'] = function ($app) {
            return $app[PublicApplication::class];
        };

        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('saltedge.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'saltedge');

        $this->app->singleton(PublicApplication::class, function ($app) {
            return new PublicApplication(array_get($app['config'], 'saltedge'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PublicApplication::class,
            'SaltedgePublic',
        ];
    }
}
