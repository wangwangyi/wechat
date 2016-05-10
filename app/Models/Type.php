<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['id', 'name'];

    //一个类型有很多属性
    public function attributes()
    {
        return $this->hasMany('App\Models\Attribute');
    }
}
