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
//    protected $fillable = ['user_id','ag_id','a_id','minus','kj_num','status','card_code_id'];
//    protected $
    function log(){
        return $this->hasMany(LogModel::class,'ug_id','id');
    }

    function goods(){
        return $this->belongsTo(ActivityGoodsModel::class,'ag_id','id');
    }

    function activity(){
        return $this->belongsTo(ActivityModel::class,'a_id','id');
    }

    function user(){
        return $this->belongsTo(UserModel::class,'user_id','id');
    }

    public static function  participateList($a_id,$user_id){
        return self::where([
            ['a_id',$a_id],
            ['user_id',$user_id]
        ])->with('goods')->get();
    }

    //获取商品信息
    public static function info($ag_id,$user_id)
    {
        return self::with(['goods','activity'])->where([['ag_id',$ag_id],['user_id',$user_id]])->first();
    }

    //帮忙砍价获取商品信息
    public static function info1($ag_id,$user_id)
    {
        return self::with([
            'goods',
            'user'=>function($query){
                    return $query->select('id','user_name','user_avatar');
                },
            'activity'=>function($query){
                return $query->select('id','ac_content');
            }
        ])->where([['ag_id',$ag_id],['user_id',$user_id]])->first();
    }

    //检查是否已参与
    public function check($user_id,$ag_id)
    {
        $count = $this->where([['user_id',$user_id],['ag_id',$ag_id]])->count();
        return $count && true;
    }

    //添加一条参与记录
    public function add($user_id,$goods_id)
    {

        $agModel = new ActivityGoodsModel();
        $goodsInfo = $agModel->goodsInfo($goods_id)->toArray();

        $this->ag_id = $goods_id;
        $this->user_id = $user_id;
        $this->a_id = $goodsInfo['activity_id'];
        $this->minus = 0;
        $this->kj_num = 0;
        $this->status = '0';
        $this->card_code_id = 0;

        //新增一条参与记录
        $this->save();
        return $this->getKey();
    }
}