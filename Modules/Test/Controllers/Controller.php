<?php
/**
 * Created by PhpStorm.
 * User: 12167
 * Date: 2018/12/28
 * Time: 11:15
 */

namespace Modules\Modules\Test\Controllers;


use App\Http\Controllers\Controller as BaseController;
use Modules\Modules\Test\Model\UserModel;

class Controller extends BaseController
{
    public $user = [];
    public function __construct()
    {
        $token = request('token','');
        if ($token)
        {
            $this->user = UserModel::tokenToUser($token);
        }
    }
}