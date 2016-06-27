<?php

namespace Displore\Menus;

use Illuminate\Support\ServiceProvider;

class MenusServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // The basic menu implementation configuration.
        $this->publishes([
            __DIR__.'/../config/menu.php' => config_path('displore/menu.php'),
        ], 'displore.menu.config');

        $this->mergeConfigFrom(__DIR__.'/../config/menu.php', 'displore.menu');
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->bind('Displore\Menus\Contracts\MenuBuilder', 'Displore\Menus\Builder');
        $this->app->bind('menu', function () {
            return $this->app->make('Displore\Menus\Contracts\MenuBuilder');
        });
    }
}
