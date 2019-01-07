<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/3
 * Time: 15:15
 */

namespace Modules\Modules\Test\Controllers\Api;



use Illuminate\Http\Request;
use Modules\Modules\Test\Validator\CheckSmsValidator;
use Modules\Modules\Test\Validator\SendMessValidator;
use Modules\Modules\Test\Validator\SendSmsValidator;

class SmsController extends Controller
{
    //发送验证码
    public function sendSms(Request $request)
    {
        $param = $request->all();

        (new SendSmsValidator())->goCheck($param);
        $param['client_ip'] = $request->ip();
        $param['template_code'] = config('test.sms_code');

        $uri = http_build_query($param);
        $url = config('test.open_api').'/v1/api/sms/sendsms?'.$uri;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return success($data,'ok');
    }

    //检查验证码
    public function checkSms(Request $request)
    {
        $param = $request->all();

        (new CheckSmsValidator())->goCheck($param);

        $param['client_ip'] = $request->ip();

        $uri = http_build_query($param);
        $url = config('test.open_api').'/v1/api/sms/verifycode?'.$uri;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return success($data,'ok');
    }

    //发送业务短信
     public function sendMess(Request $request)
    {
        $param = $request->all();
        (new SendMessValidator())->goCheck($param);

        $param['client_ip'] = $request->ip();
        $param['template_code'] = config('test.sms_mess_code');

        $uri = http_build_query($param);
        $url = config('test.open_api').'/v1/api/sms/sendmess?'.$uri;
        $data = curl_get($url, 5,['Authorization:Bearer '.getAccessToken()]);

        return success($data,'ok');
    }

}