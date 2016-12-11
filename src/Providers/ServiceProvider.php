<?php namespace LasseHaslev\LaravelModules\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LasseHaslev\LaravelModules\Modules;

/**
 * Class ServiceProvider
 * @author Lasse S. Haslev
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../../config/modules.php', 'modules');
        Modules::registerAll();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/modules.php'=>'modules',
        ]);

    }
}
