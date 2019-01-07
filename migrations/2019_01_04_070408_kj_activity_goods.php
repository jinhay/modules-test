<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KjActivityGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kj_activity_goods', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('coupon_id')->default(0)->comment('卡卷id');
            $table->string("goods_title")->comment('商品标题');
            $table->decimal("goods_price",10,2)->comment('商品价格');
            $table->unsignedInteger("goods_num")->default(0)->comment('商品库存');
            $table->unsignedInteger("kj_goal")->default(0)->comment('砍价目标');
            $table->unsignedInteger("kj_num")->default(0)->comment('砍价次数');
            $table->string('goods_images')->comment('商品图片');
            $table->text('goods_info')->comment('商品详情');
            $table->unsignedInteger("activity_id")->comment('关联活动id');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kj_activity_goods');
    }
}
