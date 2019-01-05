<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/5
 * Time: 10:48
 */

namespace Modules\Modules\Test\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Modules\Test\Model\ActivityModel;
use Modules\Modules\Test\Model\UserGoodsModel;

class IndexController extends Controller
{
    //首页列表
    public function index($id,$user_id){
        $data = ActivityModel::getActivityInfo($id,$user_id);

        if (!empty($data)){
            return error([],'活动未开始');
        }
        return response($data);
    }

//    我的发起列表
    public function participate($id=2,$user_id=1){

        $dat = UserGoodsModel::participateList($id,$user_id);

        if (!empty($dat)){
            return success([],'未参与活动呢');
        }

        return success($dat,'ok');
    }
}