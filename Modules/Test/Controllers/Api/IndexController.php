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
    public function index($id,$token){
        $user = UserModel::tokenToUser($token);
        if (empty($user)){
            return error([],'请先登录');
        }
        $data = ActivityModel::getActivityInfo($id,$user[0]['id']);

        if (empty($data)){
            return error([],'活动未开始');
        }
        return response($data);
    }

//    我的发起列表
    public function participate($id,$token){
        $user = UserModel::tokenToUser($token);
        if (empty($user)){
            return error([],'请先登录');
        }
        $dat = UserGoodsModel::participateList($id,$user[0]['id']);

        if (empty($dat)){
            return success([],'未参与活动呢');
        }

        return success($dat,'ok');
    }
}