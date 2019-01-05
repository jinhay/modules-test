<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class SendSmsValidator extends BaseValidator
{
    public $rule = [
        'mobile' => ['required','regex:/^1[34578][0-9]{9}$/'],
    ];
    public $message = [
        'mobile.required' => 'mobile不能为空',
        'mobile.regex' => 'mobile格式错误',
    ];
}