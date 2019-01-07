<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/3
 * Time: 17:00
 */

namespace Modules\Modules\Test\Controllers\Api;



use Illuminate\Http\Request;
use Modules\Modules\Test\Controllers\Controller;
use Modules\Modules\Test\Validator\GetCouponValidator;
use Modules\Modules\Test\Validator\IdValidator;

class CouponController extends Controller
{
    //优惠卷信息
    public function couponInfo($id){
        (new IdValidator())->goCheck(['id'=>$id]);

        $url = config('test.open_api').'/v1/api/coupon/coupon/'.$id;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return success($data,'ok');

    }

    //获取优惠卷
    public function getCoupon(Request $request){
        (new GetCouponValidator())->goCheck($request->all());
        $url = config('test.open_api').'/v1/api/coupon/common-coupon';
        $data = curl_post($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return success($data,'ok');
    }


}