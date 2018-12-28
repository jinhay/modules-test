<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 11:15
 */

namespace App\Modules\Test\Controllers;


use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
//        dump( config() );
            return view(config("test.modules_view")."index");
    }
}