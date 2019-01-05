<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class SendMessValidator extends BaseValidator
{
    public $rule = [
        'channel' => ['required'],
        'mobile' => ['required','regex:/^1[34578][0-9]{9}$/'],
        'card_name' => ['required'],
        'card_code' => ['required'],
    ];
    public $message = [
        'channel.required' => 'channel 不能为空',
        'mobile.required' => 'mobile不能为空',
        'card_name.required' => 'card_name 不能为空',
        'card_code.required' => 'card_code 不能为空',
        'mobile.regex' => 'mobile格式错误',
    ];
}