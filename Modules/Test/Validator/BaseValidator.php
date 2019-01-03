<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/2
 * Time: 15:49
 */

namespace Modules\Modules\Test\Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseValidator
{
    protected $rule = [];
    protected  $message = [];

    public function goCheck($data = [])
    {
        if (!is_array($data)){
            return ;
        }
        if (empty($data)){
            $request = new Request();
            $param = $request->except("_method");
        }else{
            $param = $data;
        }

        $validate = Validator::make($param,$this->rule,$this->message);
        if ($validate->fails())
        {

            echo json_encode( [
                'error_code'=>400,

                'error_msg' => $validate->errors(),

                'data'=>[]
            ]); die() ;
        }
        return true;
    }

}