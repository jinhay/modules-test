<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/7
 * Time: 15:00
 */

namespace Modules\Modules\Test\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Modules\Test\Controllers\Controller;
use Modules\Modules\Test\Model\UserModel;
use Modules\Modules\Test\Validator\LoginValidator;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $info = $request->all();
        //检验提交信息
        (new LoginValidator())->goCheck($info);

        //检验验证码是否正确
        $param = [
            'client_ip' => $request->ip(),
            'verify_code' => $info['verify_code'],
            'mobile' => $info['user_tel']
        ];
        $data = $this->check_sms($param);
        if (!isset($data['code'])) {
            return error($data, '验证码错误');
        }

        //砍价用户信息留存
        $user = UserModel::userSave($info);
        return success($user->toArray(),'登录成功');
        //调用用户登录注册接口
        //调用留资料接口
        /*$clue = [
            'user_name' => $info['user_name'],
            'phone' => $info['user_tel'],
            'store_codes' => 'H2901',
            'page_id' => config('test.page_id'),
            'source' => 17,
            'ip'    => $request->ip(),
            'sex'   => 0,
            'clue_name' => config('test.clue_name'),
            'clue_url'  => $request->fullUrl(),
            'clue_type'  => 3,
            'is_send'   => 0,
            'terminal'  => 'wap',
            'car_series_id' => '8'
        ];
        dd(clue($clue));*/

    }

    private function check_sms($param)
    {
        $uri = http_build_query($param);
        $url = config('test.open_api') . '/v1/api/sms/verifycode?' . $uri;
        return $data = curl_get($url, 5, ['Authorization:Bearer ' . getAccessToken()]);
    }


}