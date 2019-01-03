<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 16:07
 */

namespace Modules\Modules\Test\Validator;


class GetCouponValidator extends BaseValidator
{
    public $rule = [
        'coupon_id' => ['required', 'integer'],
        'mobile' => ['required', 'integer'],
        'surname' => ['required', 'digits_between:1,15'],
        'source' => ['required'],
        'activity_store_code' => ['required'],


    ];
    public $message = [
        'coupon_id.required' => 'coupon_id不能为空',
        'mobile.required' => 'mobile不能为空',
        'surname.required' => 'surname不能为空',
        'source.required' => 'source不能为空',
        'activity_store_code.required' => 'activity_store_code不能为空',
        'coupon_id.integer' => 'coupon_id必须为整数',
        'mobile.integer' => 'mobile必须为整数',
        'surname.digits_between'=>'surname长度需要在15以内'
    ];
}