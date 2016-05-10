<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function weixin_user()
    {
        return $this->belongsTo('App\Models\Weixin_user');
    }

    public function good()
    {
        return $this->belongsTo('App\Models\Good');
    }

    /**
     * 计算购物车总价和数量
     */
    static function count_cart($carts = null)
    {
        $count = [];

        $weixin_user = session()->get('weixin_user');
        //避免重复查询数据
        $carts = $carts ? $carts : Cart::with('good')->where('weixin_user_id', $weixin_user->id)->get();

        $total_price = 0;
        $num = 0;
        foreach ($carts as $v) {
            $total_price += $v->good->price * $v->number;
            $num += $v->number;
        }

        $count['total_price'] = $total_price;
        $count['number'] = $num;

        return $count;
    }
}
