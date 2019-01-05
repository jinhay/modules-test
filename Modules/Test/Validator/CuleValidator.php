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
        'phone' => ['required','regex:/^1[34578][0-9]{9}$/'],
        'user_name'=>['required'],
        'page_id'=>['required'],
        'sex'=>['required'],
        'clue_name'=>['required'],
        'is_send'=>['required'],
        'terminal'=>['required'],
        'car_series_id'=>['required'],
    ];
    public $message = [
        'phone.required' => 'phone 不能为空',
        'user_name.required' => 'user_name 不能为空',
        'page_id.required' => 'page_id 不能为空',
        'sex.required' => 'sex 不能为空',
        'clue_name.required' => 'clue_name 不能为空',
        'is_send.required' => 'is_send 不能为空',
        'terminal.required' => 'terminal 不能为空',
        'car_series_id.required' => 'car_series_id 不能为空',
        'phone.regex' => 'phone 格式错误',
    ];
}