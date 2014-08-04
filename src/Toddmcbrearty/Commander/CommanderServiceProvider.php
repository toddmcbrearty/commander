<?php namespace Toddmcbrearty\Commander;

use Illuminate\Support\ServiceProvider;

class CommanderServiceProvider extends ServiceProvider
{

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
        $this->registerCommandTranslator();

        $this->registerCommandBus();

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['commander'];
    }

    public function registerCommandTranslator()
    {
        $this->app->bind('Toddmcbrarty\Commander\CommandTranslator', ' Toddmcbrearty\Commander\BasicCommandTranslator');

    }

    public function registerCommandBus()
    {
        $this->app->bindShared(
            'Toddmcbrearty\Commander\CommandBus',
            function () {
                return $this->app->make('Laracast\Commander\ValidationCommandBus');
            }
        );
    }

}
