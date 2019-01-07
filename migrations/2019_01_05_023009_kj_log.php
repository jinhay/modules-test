<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KjLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kj_log', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->comment("用户id");
            $table->integer('ag_id')->comment("参与记录id");
            $table->string('user_name')->comment("用户名称");
            $table->string('user_avatar')->comment("用户头像");
            $table->integer('minus')->comment("砍去多少");
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
        Schema::dropIfExists('kj_log');
    }
}
