<?php

namespace Modules\src;

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

//            $this->publishes([__DIR__.'/../Modules'=>app_path("Modules"),"modules"]);
//            $this->publishes([__DIR__.'/../view'=>resource_path('views')],"modules-view");
            $this->publishes([__DIR__.'/../config/test.php'=>config_path('test.php')],'modules-config');
            $this->publishes([__DIR__."/../migrations/"=>database_path("migrations")]);
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
