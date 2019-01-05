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
Route::post("api/coupon/getCoupon",\Modules\Modules\Test\Controllers\Api\CouponController::class."@getCoupon");

Route::get('modules/api/index/{id}/{user_id?}',\Modules\Modules\Test\Controllers\Api\IndexController::class."@index");
Route::get('modules/api/participate/{id}/{user_id?}',\Modules\Modules\Test\Controllers\Api\IndexController::class."@participate");
Route::get('modules/api/goods_info/{id}/{user_id}',\Modules\Modules\Test\Controllers\Api\ActivityController::class."@goodsInfo");