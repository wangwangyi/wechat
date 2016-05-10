<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Models\Good;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Good_gallery;
use Cache;
class GoodController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
        view()->share(['_good' => 'open active','_a' =>'block','_goods' => 'active','_trash' => 'active']);
    }

    private function messages()
    {
        return [
            'name.required' => '商品名称不能为空！',
            'category_id.required' =>'分类名称不能为空！',
        ];
    }

    private function attributes()
    {
        view()->share([
            'categories' => Category::get_categories(),
            'brands' => Brand::orderBy('sort_order')->get(),
            'filter_categories' => Category::filter_categories()
        ]);
    }

    function index(Request $request)
    {
        $where = function ($query) use ($request)
        {
            if($request->has('keyword')){
                $query->where("name","like","%".$request->keyword."%");
            }
            if($request->has('category_id')){
                $query->where('category_id',$request->category_id);
            }
            if($request->has('brand_id')){
                $query->where('brand_id',$request->brand_id);
            }
            if($request->has('price')){
                $price = $request->price;
                $arr[] = explode("-",$price);
                $query->whereBetween('price',$arr);
            }
            if($request->has('created_at')){
                $date = $request->created_at;
                $time = explode(' - ',$date);
                foreach($time as $k=>$v){
                    $date["$k"] = $k==0 ? $v ." 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at',$time);

            }

        };
        $goods = Good::with('category','brand')->where($where)->paginate(10);
        $this->attributes();
        return view('admin.good.index')->with('goods',$goods);
    }

    function create()
    {
        $categories = Category::get_categories();
        $brands = Brand::get();
        return view('admin.good.create')->with('categories',$categories)
                                           ->with('brands',$brands);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $good = Good::create($request->except(['file', 'imgs']));


        //商品相册
        if ($request->imgs) {
            foreach ($request->imgs as $img) {
                $good_gallery = new Good_gallery();
                $good_gallery->good_id = $good->id;
                $good_gallery->imgs = $img;
                $good_gallery->save();
            }

        }
        return redirect(route('admin.good.index'))->with('msg', '添加成功！');
    }

    function edit($id)
    {
        $categories = Category::get_categories();
        $brands = Brand::get();
        $good = Good::with('good_galleries')->find($id);
        return view('admin.good.edit')->with('categories',$categories)
                                         ->with('brands',$brands)
                                         ->with('good',$good);
    }

    function update(Request $request,$id)
    {

        $good = Good::find($id);

        $result = $request->except(['file','imgs']);
        $good->update($result);

        //商品相册
        if ($request->imgs) {
            foreach ($request->imgs as $img) {
                $good_gallery = new Good_gallery();
                $good_gallery->good_id = $good->id;
                $good_gallery->imgs = $img;
                $good_gallery->save();
            }
        }
        return redirect(route('admin.good.index'))->with('msg', '编辑成功！');
    }


    function change_price(Request $request)
    {
        Cache::forget('admin_good_goods');
        $price = Good::find($request->id);
        $price->update(['price' => $request->price]);
    }
    //删除商品
    function destroy($id)
    {
        if (!Good::check_orders($id)) {
            return back()->with('msg', '当前商品拥有对应的订单，无法删除~');
        }
        Good::destroy($id);
        return back()->with('msg', '被删商品已进入回收站~');
    }
    //删除相册edit图片
    function del(Request $request)
    {
             Good_gallery::destroy($request->id);
    }

    function del_select(Request $request)
    {
        $del_id = $request->del_id;
        Good::destroy($del_id);
    }

    function onsale(Request $request)
    {
        $good = Good::find($request->id);
        $good->update(['onsale' => $request->onsale]);
    }

    function change_attr(Request $request)
    {
        $value = $request->value == "true" ? 0 : 1;
        $good = Good::find($request->id);
        $good->update([$request->type => $value]);
    }

    //商品回收站
    function trash()
    {
        $goods = Good::onlyTrashed()->get();
        return view('admin.good.trash')->with('goods',$goods);
    }

    //还原
    function restore($id)
    {
     //   return 123;
        Good::onlyTrashed()->where('id', $id)->restore();
        return redirect('admin/good/trash')->with('msg', '还原成功！');
    }
    //强制删除
    function forceDelete($id)
    {
        Good::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect('admin/good/trash')->with('msg', '删除成功！');
    }

    //回收站全选删除

    function select_del(Request $request)
    {
        $select_id = $request->select_id;
        foreach($select_id as $v){
            $good = Good::onlyTrashed()->find($v);
            $good->forceDelete();
        }
    }

    //回收站全选还原

    function select_restore(Request $request)
    {
        $select_id = $request->select_id;
        foreach($select_id as $v){
            $good = Good::onlyTrashed()->find($v);
            $good->restore();
        }
    }

}
