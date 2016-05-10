<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Weixin_user;
use App\Models\Order;


class Weixin_userController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_weixin' => 'active']);
    }

   function index(Request $request)
   {
       $where = function ($query) use ($request) {
           //姓名查找
           if ($request->has('keyword')) {
               $query->where('nickname', "like","%".$request->keyword."%");
           }
       };

       $users = Weixin_user::where($where)->paginate(8);
       return view('admin.weixin_user.index')->with('users',$users);
   }

    /*function edit($id)
    {
        $orders = Weixin_user::with('orders','addresses')->find($id);
        return $orders;
        $order_status = config('shop_express.order_status');
        return view('admin.weixin_user.edit')->with('orders',$orders)
                                                ->with('order_status',$order_status);
    }*/
}
