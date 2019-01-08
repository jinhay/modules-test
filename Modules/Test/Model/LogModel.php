<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = "kj_log";
//    protected $

    public function addLog($user,$ug_id)
    {
        $agModel = new ActivityGoodsModel();
        $ugRow = UserGoodsModel::find($ug_id);
        $ugInfo = $ugRow->toArray();
        $goodsInfo = $agModel->goodsInfo($ugInfo['ag_id'])->toArray();

        $this->user_id = $user['id'];
        $this->ug_id = $ugInfo['id'];
        $this->user_name = $user['user_name'];
        $this->user_avatar = $user['user_avatar'];
        $this->minus = $this->getMinus($goodsInfo['kj_goal']-$ugInfo['minus'],$goodsInfo['kj_num']-$ugInfo['kj_num']);
        $this->save(); //新增日志记录
        //参与记录 砍价次数+1  已砍数量增加
        $ugRow->minus += $this->minus;
        $ugRow->kj_num += 1;
        $ugRow->save();

    }

    private function getMinus($total,$num){
        if ($num == 1){
            //仅剩下一次
            return $total;
        }

        return mt_rand(floor($total/$num),floor($total/2));
    }

    //检查是否已经帮忙砍价过
    public function check()
    {

    }
   
}