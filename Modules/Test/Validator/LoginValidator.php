<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class LoginValidator extends BaseValidator
{
    public $rule = [
        'user_name'=>['required'],
        'user_tel' => ['required','regex:/^1[34578][0-9]{9}$/'],
        'verify_code'=>['required'],
    ];
    public $message = [
        'user_name.required' => 'username 不能为空',
        'user_tel.required' => 'user_tel不能为空',
        'verify_code.required' => 'verify_code不能为空',
        'user_tel.regex' => 'user_tel格式错误',
    ];
}