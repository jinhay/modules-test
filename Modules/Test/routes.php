<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 10:46
 */
Route::get("modules/test",Modules\Modules\Test\Controllers\Controller::class."@index");
Route::get("modules/checkVa/",Modules\Modules\Test\Controllers\Controller::class."@checkVa");

/**
 * api
 */



Route::group(['namespace'=>'\Modules\Modules\Test\Controllers\Api','prefix'=>'modules/api'],function (){
    //优惠卷
    Route::get("coupon/info/{pk}", CouponController::class."@couponInfo");
    Route::post("coupon/getCoupon", CouponController::class."@getCoupon");
    Route::get('index/{id}/{token}', IndexController::class."@index");
    Route::get('participate/{id}/{token}', IndexController::class."@participate");
    Route::get('goods_info/{id}/{token}',ActivityController::class."@goodsInfo");
    //用户模块
    Route::post('user/login',UserController::class.'@login');

    //短信
    Route::post('sms/send',SmsController::class.'@sendSms');

    //商品
    Route::get('goods/info/{goods_id}/{token}',GoodsController::class."@info");

}
);