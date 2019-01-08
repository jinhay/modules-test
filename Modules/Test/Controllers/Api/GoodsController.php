<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2019/1/7
 * Time: 15:00
 */

namespace Modules\Modules\Test\Controllers\Api;




use Modules\Modules\Test\Controllers\Controller;
use Modules\Modules\Test\Model\LogModel;
use Modules\Modules\Test\Model\UserGoodsModel;

class GoodsController extends Controller
{
    //自己查看商品、未参与会自动参与
    public function info($goods_id)
    {
        //检查是否已经参与
        $ugModel = new UserGoodsModel();
        $logModel = new LogModel();
        if(!$ugModel->check($this->user['id'],$goods_id)){
            $ug_id =$ugModel->add($this->user['id'],$goods_id);
            $logModel->addLog($this->user,$ug_id);
        }

        $info = $ugModel->info($goods_id,$this->user['id'])->toArray();

        return success($info,'ok');
    }

    //好友帮忙砍价列表
    public function kjList($ug_id)
    {
        $data = UserGoodsModel::find($ug_id);
        if (empty($data)){
            return success(['data'=>[]],'ok');
        }
        $data = $data->log()->paginate(15)->toArray();
        return success($data,'ok');
    }

    //分享goods内容
    public function shareInfo($ug_id)
    {
        //获取活动用户id
        $ugModel = new UserGoodsModel();
        $ugInfo = $ugModel->where('id',$ug_id)->first()->toArray();
        if (empty($ugInfo)){
            return error([],'未找到该商品');
        }
        $info = $ugModel->info1($ugInfo['ag_id'],$ugInfo['user_id'])->toArray();

        return success($info,'ok');
    }

}