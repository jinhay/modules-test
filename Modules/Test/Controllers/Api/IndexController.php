<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/5
 * Time: 10:48
 */

namespace Modules\Modules\Test\Controllers\Api;


use Modules\Modules\Test\Controllers\Controller;
use Modules\Modules\Test\Model\ActivityModel;
use Modules\Modules\Test\Model\UserGoodsModel;
use Modules\Modules\Test\Model\UserModel;

class IndexController extends Controller
{
    //首页列表
    public function index($id){

        $data = ActivityModel::getActivityInfo($id,$this->user['id']);

        if (empty($data)){
            return error([],'活动未开始');
        }
        return response($data);
    }

//    我的发起列表
    public function participate($id){

        $dat = UserGoodsModel::participateList($id,$this->user['id']);

        if (empty($dat)){
            return success([],'未参与活动呢');
        }

        return success($dat,'ok');
    }
}