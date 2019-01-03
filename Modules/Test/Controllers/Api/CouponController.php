<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/3
 * Time: 17:00
 */

namespace Modules\Modules\Test\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Modules\Test\Validator\GetCouponValidator;
use Modules\Modules\Test\Validator\IdValidator;

class CouponController extends Controller
{
    //优惠卷信息
    public function couponInfo($id){
        (new IdValidator())->goCheck(['id'=>$id]);

        $url = config('test.open_api').'/v1/api/coupon/coupon/'.$id;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return response($data);

    }

    //优惠卷信息
    public function getCoupon(Request $request){
        (new GetCouponValidator())->goCheck($request->all());
        $url = config('test.open_api').'/v1/api/coupon/common-coupon';
        $data = curl_post($url, 5,['Authorization:Bearer '.getAccessToken()]);

        if (!isset($data['error'])){
            return success($data,'ok');
        }else{
            return response($data);
        }
    }


}