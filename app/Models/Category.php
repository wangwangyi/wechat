<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{

    protected $fillable = ['name','parent_id','thumb','sort_order','is_show','desc'];
   static function get_categories()
    {
        $categories = Cache::rememberForever('admin_category_categories', function () {
            return self::with(['children' =>function($query){
                $query->orderBy('sort_order');
            }])->where('parent_id',0)->orderBy('sort_order')->get();
        });
        return $categories;
    }
    /**
     * 递归生成无限极分类            类方法,静态方法
     * @return mixed
     */
  /* static function get_categories()
    {
        $categories = Cache::rememberForever('admin_category_categories', function () {
            $categories = self::orderBy('parent_id')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
            return tree($categories);
        });
        return $categories;
    }*/
    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    static function clear()
    {
        Cache::forget('admin_category_categories');
    }

    public function goods()
    {
        return $this->hasMany('App\Models\Good');
    }

    /**
     * 筛选分类时,屏蔽掉没有商品的分类
     */
    static function filter_categories()
    {
        $categories = self::has('children.goods')->with(['children' => function ($query) {
            $query->has('goods');
        }])->get();
        return $categories;
    }

    /**
     * 检查是否有子栏目
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * 检查当前分类是否有商品
     */
    static function check_goods($id)
    {
        $category = self::with('goods')->find($id);
        if ($category->goods->isEmpty()) {
            return true;
        }
        return false;
    }
}
