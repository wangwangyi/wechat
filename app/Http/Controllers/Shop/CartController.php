<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cart;

class CartController extends CommonController
{
    function cart()
    {

        $carts = Cart::with('good')->where('weixin_user_id', $this->weixin_user->id)->get();

        return view('shop.cart')->with('carts',$carts)->with('count', Cart::count_cart($carts));
    }

    function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $good_id = $request->good_id;
        $cart = Cart::where('good_id', $good_id)->where('weixin_user_id', $this->weixin_user->id)->first();


        if ($cart) {
            Cart::where('id', $cart->id)->increment('number');
            return;
        }

        //否则购物车表,创建新数据
        Cart::create([
            'good_id' => $request->good_id,
            'weixin_user_id' => $this->weixin_user->id,
        ]);
    }

    function change_num(Request $request)
    {
        if ($request->type == 'add') {
            Cart::where('id', $request->id)->increment('number');
        } else {
            Cart::where('id', $request->id)->decrement('number');
        }
        return Cart::count_cart();
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        Cart::destroy($id);
        return Cart::count_cart();
    }
}
