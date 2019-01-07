<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class ActivityGoodsModel extends Model
{
    protected $table = "kj_activity_goods";

    public function userGoods()
    {
        return $this->hasOne(UserGoodsModel::class,'ag_id','id');
    }
//    protected $

    public function goodsInfo($goods_id)
    {
        return $this->where('id',$goods_id)->first();
    }
   
}