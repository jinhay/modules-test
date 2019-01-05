<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/4
 * Time: 10:42
 */

namespace Modules\Modules\Test\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarSeriesController extends Controller
{
    public function Info(Request $request)
    {
        $param = $request->all();
        $uri = http_build_query($param);
        $url = config('test.open_api').'/v1/api/base/getCarSeriesInfo?'.$uri;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);
        return success($data,'ok');
    }
}