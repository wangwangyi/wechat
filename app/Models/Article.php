<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    //设置表名
    protected $dates = ['deleted_at'];


}
