<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class IdValidator extends BaseValidator
{
    public $rule = [
        'id'    => ['required','numeric']
    ];
    public $message = [
        'id.required' => 'id不能为空',
        'id.numeric'    => 'id必须为纯数字'
    ];
}