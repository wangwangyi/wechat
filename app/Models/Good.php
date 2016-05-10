<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Cache;
class Good extends Model
{

    use SoftDeletes;
    //设置表名
    protected $dates = ['deleted_at'];
    /*public $table = 'goods';*/

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function good_galleries()
    {
        return $this->hasMany('App\Models\Good_gallery');
    }

    public function order_goods()
    {
        return $this->hasMany('App\Models\Order_good');
    }

    //检查当前商品是否有订单
    static function check_orders($id)
    {
        $good = self::with('order_goods')->find($id);
        if ($good->order_goods->isEmpty()) {
            return true;
        }
        return false;
    }


}
