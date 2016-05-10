<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function express()
    {
        return $this->belongsTo('App\Models\Express');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function order_goods()
    {
        return $this->hasMany('App\Models\Order_good');
    }

    public function weixin_user()
    {
        return $this->belongsTo('App\Models\Weixin_user');
    }

    public function order_address()
    {
        return $this->hasOne('App\Models\Order_address');
    }
}
