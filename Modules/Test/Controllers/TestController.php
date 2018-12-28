<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 11:15
 */

namespace Modules\Test\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
//        dump( config() );
        $users = DB::select('select * from admin_users where 1');
        return view(config("test.modules_view")."index",['user'=>$users]);
    }
}