<?php

namespace Modules;



abstract class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function boot()
    {
        if ($module = $this->getModule(func_get_args()))
        {
            $this->loadRoutesFrom( "./".$module . '/routes.php');
//            $this->package('app/' . $module, $module, app_path() . '/modules/' . $module);
        }
    }

    public function register()
    {
        if ($module = $this->getModule(func_get_args()))
        {
            //这句有问题 我乱改的我不明白他原来的是什么作用
//            $this->app['config']->has('app/' . $module, app_path() . '/modules/' . $module . '/config');
//            $this->app['config']->package('app/' . $module, app_path() . '/modules/' . $module . '/config');
//            $this->publishes([__DIR__."/config/config.php"]);

            // Add routes

            $routes = './' . $module . '/routes.php';

            if (file_exists($routes)) require $routes;
        }

    }



    public function getModule($args)

    {

        $module = (isset($args[0]) and is_string($args[0])) ? $args[0] : null;



        return $module;

    }



}
