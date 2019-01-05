<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KjUserGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kj_user_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment("用户id");
            $table->integer("ag_id")->comment("活动商品id");
            $table->integer("a_id")->comment("活动id");
            $table->integer('minus')->comment("已砍");
            $table->integer('kj_num')->comment("已砍次数");
            $table->integer('card_code_id')->comment("领取的卡卷id");
            $table->enum("status",['0','1','2'])->comment('状态： 0砍价中 1已完成 2已领取');
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
        Schema::dropIfExists('kj_user_goods');
    }
}
