<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "kj_user";
//    protected $
protected $fillable = ['user_tel','user_name','token'];

    public static function userSave($info)
    {
        $insert = [
            'user_name' => $info['user_name'],
            'user_tel'  => $info['user_tel'],
            'token'     => md5($info['user_tel'].$info['user_name']),
        ];
        isset($info['user_avatar']) && $insert['user_avatar'] = $info['user_avatar'];
        return self::firstOrCreate(['user_tel'=>$info['user_tel']],$insert);

    }

    //token换取用户信息
    public static function tokenToUser($token){
        return self::find(['token'=>$token])->toArray();
    }
   
}