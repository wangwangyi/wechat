<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class CommonController extends Controller
{
    protected $weixin_user;

    function __construct()
    {
       /* $this->weixin_user = session()->get('weixin_user');
        if (session()->has('weixin_user')) {
            $this->weixin_user = session()->get('weixin_user');
            return;
        }

     //   如果是调试模式, 直接读取数据库用户,注册到session中
        if (config("shop_express.debug")) {
            session()->put('weixin_user', Weixin_user::find(1));
        } else {
            $this->check_login();
        }*/

        $this->weixin_user = session()->get('weixin_user');
    }


}
