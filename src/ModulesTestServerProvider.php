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
//            $this->publishes([__DIR__.'/../View'=>resource_path('views')],"modules-View");
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
