<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/29
 * Time: 14:37
 */

namespace Modules\Modules\Test\Model;


use Illuminate\Database\Eloquent\Model;

class UserGoodsModel extends Model
{
    protected $table = "kj_user_goods";
//    protected $
    function log(){
        return $this->hasMany(LogModel::class,'ug_id','id');
    }

    function goods(){
        return $this->belongsTo(ActivityGoodsModel::class,'ag_id','id');
    }

    public static function  participateList($a_id,$user_id){
        return self::where([
            ['a_id',$a_id],
            ['user_id',$user_id]
        ])->with('goods')->get();
    }
   
}