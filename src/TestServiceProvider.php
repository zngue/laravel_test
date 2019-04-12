<?php

namespace Zngue\Test;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('test', \Zngue\Test\Middleware\TestMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/test.php' => config_path('test.php'),
        ], 'test_config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'test');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/test'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'test');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/test'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/test'),
        ], 'test_assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Zngue\Test\Commands\TestCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/test.php', 'test'
        );
    }
}
