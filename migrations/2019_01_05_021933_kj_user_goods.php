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
            $table->unsignedInteger('user_id')->comment("用户id");
            $table->unsignedInteger("ag_id")->comment("活动商品id");
            $table->unsignedSmallInteger("a_id")->comment("活动id");
            $table->unsignedInteger('minus')->comment("已砍");
            $table->unsignedSmallInteger('kj_num')->comment("已砍次数");
            $table->unsignedInteger('card_code_id')->comment("领取的卡卷id");
            $table->enum("status",['0','1','2'])->comment('状态： 0砍价中 1已完成 2已领取');
            $table->timestamps();
            $table->unique(['user_id','ag_id'],'uk_user_id_ag_id');
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
