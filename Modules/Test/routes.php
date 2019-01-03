<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 10:46
 */
Route::get("modules/test",Modules\Modules\Test\Controllers\TestController::class."@index");
Route::get("modules/checkVa/",Modules\Modules\Test\Controllers\TestController::class."@checkVa");

/**
 * api
 */
Route::get("api/coupon/info/{pk}",\Modules\Modules\Test\Controllers\Api\CouponController::class."@couponInfo");