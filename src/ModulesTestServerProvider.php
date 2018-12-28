<?php

namespace ModulesTest\Test;

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
        if ($this->app->runningInConsole()) {
//            $this->publishes([__DIR__.'/../config' => config_path()], 'laravel-admin-config');
//            $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'laravel-admin-lang');
//            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/admin')],           'laravel-admin-views');
            //->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'laravel-admin-migrations');
            //$this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/laravel-admin')], 'laravel-admin-assets');
//            $this->publishes([__DIR__.'/../controller' => base_path('/app/Http/Controller'),'laravel-admin-controller']);
            $this->publishes([__DIR__.'/../Modules'=>app_path("Modules"),"modules"]);
            $this->publishes([__DIR__.'/../view'=>resource_path('views')],"modules-view");
            $this->publishes([__DIR__.'/../config/test.php'=>config_path('test.php')],'modules-config');
        }

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
