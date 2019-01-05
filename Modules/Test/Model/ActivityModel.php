<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    protected $table = "kj_activity";

    public  function  goods(){
        return $this->hasMany(ActivityGoodsModel::class,'activity_id','id');
    }

    //获取首页列表  活动信息
    public static function getActivityInfo($id,$user_id)
    {
        $list = self::where([['id',$id],['ac_start_time','<',time()]])->with('goods')->first();

        $userGoods = UserGoodsModel::where(['user_id'=>$user_id])->get(); //查找该用户参与该活动的所有商品
//        dd($userGoods->toArray());die;
        $list->goods->each(function ($v) use ($userGoods){
             $v['is_participate'] = $userGoods->contains('ag_id',$v['id']);

             $v['ug_id'] = $userGoods->first(function ($value) use($v){
                  return $value['ag_id']==$v['id'];
             })['id'];

            return true;
        });

        return $list;
    }

    public static function getParticipateList($id,$user_id)
    {
        return self::find($id)->goods()->get();
    }
}