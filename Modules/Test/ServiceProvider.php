<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 10:44
 */
namespace Modules\Test;

class ServiceProvider extends \App\Modules\ServiceProvider{
    public function register()

    {

        parent::register('Test');

    }



    public function boot()

    {

        parent::boot('Test');

    }

}