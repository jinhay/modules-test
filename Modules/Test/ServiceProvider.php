<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 10:44
 */
namespace Modules\Modules\Test;

//use Modules\ServiceProvider as ServerProviderP;
class ServiceProvider extends \Illuminate\Support\ServiceProvider {
    public function register()

    {

//        parent::register('Test');

    }



    public function boot()

    {
        $this->loadViewsFrom(__DIR__ . '/View/',"Modules");
        $this->loadRoutesFrom( __DIR__. '/routes.php');

//        parent::boot('Test');

    }

}