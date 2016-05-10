<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Order;

use App\Models\Express;
/*use App\Models\Address;*/

use Carbon;
class OrderController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_order' => 'active']);
    }
    function  index(Request $request)
    {
        $where = function ($query) use ($request)
        {

            if ($request->has('weixin_user_id') and $request->weixin_user_id != '') {
                $query->where('weixin_user_id', $request->weixin_user_id);
            }

            //订单号
             if($request->has('express_code')){
                $query->where('express_code',$request->express_code);
            }
            //价格
            if($request->has('total_price') and $request->total_price !=''){
                $type = is_numeric($request->total_price) ? '=': substr($request->total_price,0,1);
                $total_price = substr($request->total_price,1);

                switch ($type){
                    case '>':
                        $query->where('total_price','>=',$total_price);
                        break;
                    case '<':
                        $query->where('total_price','<=',$total_price);
                        break;
                    default:
                        $query->where('total_price',$request->total_price);
                }
        }
           // 下单时间
            if($request->has('created_at')){
                $date = $request->created_at;
                $time = explode(' - ',$date);
                foreach($time as $k=>$v){
                    $date["$k"] = $k==0 ? $v ." 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at',$time);

            }

            //订单状态
            if($request->has('status')){
                $status = $request->status;
                $query->where('status',$status);
            }

        };

        $orders = Order::with('address','order_goods','weixin_user')->where($where)->paginate(8);
        $order_status = config('shop_express.order_status');
        return view('admin.order.index')->with('orders',$orders)
                                           ->with('order_status',$order_status);
    }
    function  edit($id)
    {
        $expresses = Express::get();
   //     return $expresses;
        $order = Order::with('address', 'express','weixin_user','order_address')->find($id);
      //  return $order;

        return view('admin.order.edit', ['order' => $order])->with('expresses',$expresses);
    }


    public function update(Request $request, $id)
    {
        $order = order::find($id);
        $order->express_code = $request->express_code;
        //只有当前在未发货状态下，才修改订单状态
        if ($order->status == 1) {
            $order->status = 2;
        }
        $order->save();
        return back()->with('info', '发货成功');
    }

    public function picking(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 3;
        $order->picking_time = Carbon\Carbon::now();
        $order->save();
    }

    function shipping(Request $request)
    {
        $order = Order::find($request->id);
        if ($request->status == 3) {
            $order->status = 4;
            $order->shipping_time = Carbon\Carbon::now();
        }
        $order->express_code = $request->express_code;
        $order->express_id = $request->express_id;

        $order->save();
    }
}
