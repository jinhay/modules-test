<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 11:15
 */

namespace Modules\Modules\Test\Controllers;


use App\Http\Controllers\Controller;
use Modules\Modules\Test\Model\TestModel;

class TestController extends Controller
{
    public function index()
    {
        $users = new TestModel();
//        dd($users->get_test());die;
        return view(config("test.modules_view")."index",['user'=>$users->get_test()]);
    }

    public function checkVa()
    {
//        dd(getAccessToken());
        $test = curl_get(
            config('test.open_api').'/v1/api/coupon/coupon/481',
            5,['Authorization:Bearer '.cache('AccessToken')]);
        return response($test);
    }
}