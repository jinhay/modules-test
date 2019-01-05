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
use Modules\Modules\Test\Model\ActivityGoodsModel;
use Modules\Modules\Test\Model\ActivityModel;
use Modules\Modules\Test\Model\UserGoodsModel;
use Modules\Modules\Test\Validator\IdValidator;

class ActivityController extends Controller
{
    //自己查看砍价详情
    public function goodsInfo($id,$user_id)
    {
//        (new IdValidator())->goCheck(['id'=>$id]);
        $is_participate = ActivityGoodsModel::find($id)->userGoods()->where('user_id',2)->get()->toArray();
        if (!$is_participate){
            return error([],'已成功');
        }
        dd();die;
    }
}