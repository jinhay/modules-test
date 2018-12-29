<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table = "tests";
//    protected $
    function get_test(){
        return self::all();
    }
}