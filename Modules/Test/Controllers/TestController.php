<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 11:15
 */

namespace Modules\Modules\Test\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Modules\Test\Model\TestModel;

class TestController extends Controller
{
    public function index()
    {
        $users = new TestModel();
//        dd($users->get_test());die;
        return view(config("test.modules_view")."index",['user'=>$users->get_test()]);
    }
}