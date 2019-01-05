<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class CheckSmsValidator extends BaseValidator
{
    public $rule = [
        'mobile' => ['required','regex:/^1[34578][0-9]{9}$/'],
        'verify_code'=>['required'],
    ];
    public $message = [
        'mobile.required' => 'mobile不能为空',
        'verify_code.required' => 'verify_code不能为空',
        'mobile.regex' => 'mobile格式错误',
    ];
}