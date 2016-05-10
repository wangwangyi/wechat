<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Advertise;
use App\Models\Good;
use App\Models\Category;
use App\Models\Good_gallery;
use App\Models\Article;
use Cache;
class IndexController extends CommonController
{

    function index()
    {
       //return session()->all();
        $advertises = Advertise::where("parent_id","=",5)->paginate(4);//焦点图
        $banners = Advertise::where("parent_id","=",6)->orderBy('desc')->paginate(3);
        $new_goods = Good::with('category')->where('new_good',0)->paginate(4);
        $best_goods = Good::with('category')->where('best',0)->paginate(4);
        $hot_goods = Good::with('category')->where('hot',0)->paginate(4);
        //品牌位置广告
        $brands = Advertise::where("parent_id","=",14)->paginate(2);
        $brand = Advertise::where("id","=",14)->paginate(1);

        //特色食场广告
        $food = Advertise::where("id","=",18)->paginate(1);
        $foods = Advertise::where("parent_id","=",18)->paginate(2);

        $t = Advertise::where("parent_id","=",21)->paginate(2);


     /*   $good = count(Good::paginate(2));
        $goods =count( Good::get());
        $page = round($goods/$good);
        // return $page;
        $min = ($page - 1) * 2;

        $more = Good::limit($min, 2)->paginate(2);*/

        return view('shop.index')->with('advertises',$advertises)
                                   ->with('banners',$banners)
                                   ->with('new_goods',$new_goods)
                                   ->with('best_goods',$best_goods)
                                   ->with('hot_goods',$hot_goods)
                                   ->with('brands',$brands)
                                   ->with('brand',$brand)
                                   ->with('foods',$foods)
                                   ->with('food',$food)
                                   ->with('t',$t);
    }




    function category()
    {
        $categories = Category::get_categories();
        Cache::forget('admin_category_categories');
        return view('shop.category')->with("categories",$categories);
    }

    function good($id)
    {
        $good = Good::find($id);
        $good_galleries = Good_gallery::where("good_id","=",$id)->get();
        $recommends = Good::where('hot', true)
//            ->where('category_id', $product->category_id)
            ->where('id', '<>', $id)
            ->get();
       // return $good_galleries;
        return view('shop.good')->with('good',$good)
                                  ->with('good_galleries',$good_galleries)
                                  ->with('recommends',$recommends);
    }

    function good_list($id)
    {
        $goods = Good::with('category')->where('category_id',$id)->paginate(10);
      //  return $goods;
        return view('shop.good_list')->with('goods',$goods);
    }


    function express()
    {
        return view('shop.express');
    }

    function content()
    {

        return view('shop.content');
    }




}
