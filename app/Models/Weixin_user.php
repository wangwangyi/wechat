<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weixin_user extends Model
{

    protected $guarded = [];
     public function orders()
   {
    return $this->hasMany('App\Models\Order');
   }



    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

}
