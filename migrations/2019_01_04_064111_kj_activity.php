<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KjActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable("kj_activity")){

            Schema::create('kj_activity', function (Blueprint $table) {
                $table->increments('id');
                $table->string("ac_title",200)->comment('活动标题');
                $table->unsignedInteger('ac_start_time')->comment('活动开始时间');
                $table->unsignedInteger('ac_exit_time')->comment('活动开始时间');
                $table->unsignedTinyInteger("is_hidden")->default(0)->comment("是否隐藏参与人数");
                $table->unsignedSmallInteger("dummy_num")->default(0)->comment("虚拟参与人数");
                $table->string("cover_plan",200)->comment('活动封面图');
                $table->text("ac_content")->comment("活动说明");
                $table->unsignedTinyInteger("is_restrict")->default(0)->comment("是否限制");
                $table->unsignedTinyInteger("ac_restrict_num")->default(0)->comment("限制砍价商品数");
                $table->string("share_title",200)->comment("分享标题");
                $table->unsignedTinyInteger("is_share_set_img")->default(0)->comment("是否自定义分享图片");
                $table->char("share_img",255)->comment("自定义分享图片地址");
                $table->string("share_content")->comment("自定义分享内容");
                $table->unsignedSmallInteger("apply")->comment("报名数");
                $table->unsignedSmallInteger("look")->comment("浏览数");
                $table->string("store")->comment("适用门店");
                $table->enum("type",['0','1'])->default(0)->comment("类型：0商品绑定优惠卷 1商品不绑定");
                $table->enum("status",['0','1','2','3'])->default(0)->comment("状态 0未开始 1进行中 2已结束 3已关闭");

                $table->timestamps();
                $table->unique('ac_title','uk_ac_title');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('kj_activity');
    }
}
