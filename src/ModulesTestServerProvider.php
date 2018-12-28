<?php

namespace Modules\ModulesTest;

use Illuminate\Support\ServiceProvider;

class ModulesTestServerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../Modules'=>app_path("Modules")]);
        $this->publishes([__DIR__.'/../view'=>resource_path('views')]);
        $this->publishes([__DIR__.'/../config/test.php'=>config_path('test.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
