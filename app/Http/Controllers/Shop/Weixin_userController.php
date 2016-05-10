<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Order;
class Weixin_userController extends CommonController
{
    function __construct()
    {
        parent::__construct();
        view()->share([
            'headimgurl' => $this->weixin_user->headimgurl,
        ]);
    }

    function user()
    {

        $order = count(Order::where("status","=",1)->get());
        return view('shop.user')->with('order',$order);
    }
}