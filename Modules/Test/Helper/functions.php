<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:28
 */
if (!function_exists("getAccessToken")) {
    function getAccessToken()
    {
        if (!\Cache::get('AccessToken')) {
            $url = config('test.open_api')."/oauth/token";
            $header = ['Authorization:Basic ' . base64_encode(config('test.client_id').":".config('test.client_secret'))]; //设置一个你的浏览器agent的header
            $post_data = ["grant_type" => "client_credentials"];
            $res = curl_post($url, $post_data, 5, $header);
            if (isset($res['access_token'])){
                \Cache::set('AccessToken',$res['access_token'],$res['expires_in']/60);
            }
        }
        return \Cache::get('AccessToken');
    }

    function curl_get($url, $timeout = 5,$header = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $res = json_decode(curl_exec($ch),true);//运行curl
        curl_close($ch);
        return $res;
    }

    function curl_post($url, array $params = array(), $timeout = 5, array $header = [])
    {
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $res = json_decode(curl_exec($ch),true);//运行curl
        curl_close($ch);
        return ($res);
    }

    function curl_get_https($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11');
        $res = curl_exec($ch);
        $rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $res;
    }

    function success($data = [],$msg = '',$error_code=200)
    {
        return response([
            'error_code' => $error_code,
            'error_msg' => $msg,
            'data' => $data
        ], $error_code);
    }

    function error($data = [],$msg = '',$error_code=400){
        return response([
            'error_code'=> $error_code,
            'error_msg'=> $msg,
            'data'=>$data
        ],$error_code);

    }

    function clue($param){
        $url = config('test.open_api').'/v1/api/clue';
        return $data = curl_post($url, $param, 5,['Authorization:Bearer '.getAccessToken()]);
    }
}