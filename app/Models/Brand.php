<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'url', 'logo', 'desc', 'is_show', 'sort_order'];

    public function goods()
    {
        return $this->hasMany('App\Models\Good');
    }

    /**
     * 检查当前品牌是否有商品
     */
    static function check_goods($id)
    {
        $brand = self::with('goods')->find($id);
        if ($brand->goods->isEmpty()) {
            return true;
        }
        return false;
    }
}
