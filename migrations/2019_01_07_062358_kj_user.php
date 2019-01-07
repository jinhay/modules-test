<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KjUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kj_user', function (Blueprint $table) {

            $table->increments('id');
            $table->char('user_name',255)->comment("用户id");
            $table->unsignedBigInteger('user_tel')->comment("用户号码");
            $table->char('user_avatar',255)->default('')->comment("用户头像");
            $table->char('token',255)->comment("token");
            $table->timestamps();
            $table->unique('user_tel','uk_user_tel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kj_user');
    }
}
