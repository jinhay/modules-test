<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 10:46
 */
Route::get("modules/test",Modules\Modules\Test\Controllers\TestController::class."@index");