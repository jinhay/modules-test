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
    //自己查看商品
    public function info($goods_id)
    {
        //检查是否已经参与
        $ugModel = new UserGoodsModel();
        $logModel = new LogModel();
        if(!$ugModel->check($this->user['id'],$goods_id)){
            $ug_id =$ugModel->add($this->user['id'],$goods_id);
            $logModel->addLog($this->user,$ug_id);
        }

        $info = $ugModel->info1($goods_id,$this->user['id'])->toArray();

        return success($info,'ok');
    }
}