<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cart;
use App\Models\Address;
use DB;
use App\Models\Order;
use App\Models\Order_good;
use App\Models\Order_address;
use App\Models\Good;
use App\Models\Weixin_user;

class OrderController extends CommonController
{
    function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            $query->where('weixin_user_id', $this->weixin_user->id);

            switch ($request->status) {
                case '':
                    break;
                case '1':
                    $query->where('status', 1);
                    break;
                case '2':
                    $query->whereIn('status', [2, 3, 4]);
                    break;
            }
        };

        $order_status = config('shop_express.order_status');
        $orders = Order::where($where)->with('order_goods.good', 'weixin_user', 'address')->orderBy('created_at', 'desc')->get();

        return view('shop.order.index')
            ->with('orders', $orders)
            ->with('order_status', $order_status);
    }


    function checkout()
    {
        $carts = Cart::with('good')->where("weixin_user_id","=",$this->weixin_user->id)->get();

        //如果购物车中没有商品,跳回购物车页面
        if ($carts->isEmpty()) {
            return redirect('/cart');
        }
        $address = Address::find($this->weixin_user->address_id);

        return view('shop.order.checkout')
            ->with('carts', $carts)
            ->with('count', Cart::count_cart($carts))
            ->with('address', $address);
    }


    //生成订单
    function store(Request $request)
    {
        $address = Address::find( $request->address_id);

       // return $address;

        $count = Cart::count_cart();
        $total_price = $count['total_price'];
        $data = [];


        /*//将用户选中的地址,设为默认地址
        Weixin_user::where('id', $this->weixin_user->id)->update(['address_id' => $address_id]);*/

        DB::beginTransaction();
        try {
            //生成订单
            $order = Order::create([
                'weixin_user_id' => $this->weixin_user->id,
                'total_price' => $total_price,
                'status' => 1
            ]);
            //生成地址
            Order_address::create([
                'order_id' => $order->id,
                'name' => $address->name,
                'tel' => $address->tel,
                'province' => $address->province,
                'city' => $address->city,
                'area' => $address->area,
                'detail' => $address->detail

            ]);

            $carts = Cart::with('good')->where('weixin_user_id', $this->weixin_user->id)->get();
            foreach ($carts as $cart) {
                //判断库存是否足够
                if ($cart->good->inventory != '-1' and $cart->good->inventory - $cart->number < 0) {
                    throw new \Exception('商品' . $cart->good->name . ", 目前仅剩下" . $cart->good->inventory . " 件. \n请返回购物车, 修改订单后再下单!");
                }

                //削减库存数量
                $cart->good->decrement('inventory', $cart->number);

                //插入订单商品表
                $order->order_goods()->create([
                    'good_id' => $cart->good_id,
                    'number' => $cart->number
                ]);

            }

            //清空购物车
            Cart::with('good')->where('weixin_user_id', $this->weixin_user->id)->delete();

        } catch (\Exception $e) {
//            echo $e->getMessage();

            DB::rollback();
            $data['status'] = 0;
            $data['info'] = $e->getMessage();

            return $data;
        }
        DB::commit();
        $data['value'] = $order->id;
        $data['status'] = 1;
        return $data;
    }


    public function show($id)
    {
        $order = Order::with('express', 'weixin_user', 'order_goods.good','order_address')->find($id);

     // return $order;
        return view('shop.order.show')
            ->with('order', $order);
    }

    function destroy($id)
    {
        //查出对应的商品,并将库存还回去
        $order = Order::with('order_goods')->find($id);
        foreach ($order->order_goods as $order_good) {
            $good = Good::find($order_good->good_id);
            //如果不是无限库存
            if ($good->inventory != '-1') {
                Good::where('id', $order_good->good_id)->increment('inventory', $order_good->number);
            }
        }

        //删除订单
        Order_good::where('order_id', $id)->delete();
        Order::destroy($id);
        Order_address::where('order_id', $id)->delete();
        return redirect('/order');
    }


    function show_pay($id)
    {
        $order = Order::with('order_address')->find($id);

        //计算总价格, 以分为单位, 所以: *100
      /*  $total_fre = ($order->total_price + $order->express->shoping_money) * 100;*/

        /**
         * 第 2 步：创建订单
         */
     /*   $attributes = [
            'openid' => $this->weixin_user->openid,
            'body' => '订单号:' . $order->id,
            'detail' => '长乐小卖部',
            'out_trade_no' => $order->id,
            'total_fee' => $total_fre,
            'trade_type' => 'JSAPI',
            'notify_url' => '', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
        ];
        $wechat_order = new WechatOrder($attributes);

        /**
         * 第 3 步：统一下单
         */
      /*  $payment = EasyWeChat::payment();
        $result = $payment->prepare($wechat_order);
        $prepayId = $result->prepay_id;
        $json = $payment->configForPayment($prepayId);*/

        return view('shop.order.show_pay')->with('order', $order)/*->with('json', $json)*/;
    }

}
