<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function weixin_user()
    {
        return $this->belongsTo('App\Models\Weixin_user');
    }
}
