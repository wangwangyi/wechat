<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Brand;
use Validator;

class BrandController extends CommonController
{

   public function __construct()
    {
        parent::__construct();
        view()->share(['_good' => 'open active','_a' =>'block','_brand' => 'active']);
    }


    //验证错误信息
    private function messages()
    {
        return [
            'name.required' => '品牌名称不能为空！',
        ];
    }


    function index()
    {
        $brands = Brand::orderBy('sort_order')->get();
        view()->share(['_good' => 'open','active', '_brand' => 'active']);
        return view('admin.brand.index')->with('brands', $brands);
    }

    function create()
    {
        return view('admin.brand.create');
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Brand::create($request->all());
        return redirect(route('admin.brand.index'))->with('msg', '新增成功！');
    }

    function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with('brand',$brand);
    }

    function update(Request $request)
    {
        $brand =Brand::find($request->id);
        $brand->update($request->all());
       return redirect(route('admin.brand.index'))->with('msg', '编辑成功！');
    }

    function search(Request $request)
    {
        $keyword = "%".$request->keyword."%";
        $brands = Brand::where("name","like",$keyword)->get();
        return view('admin.brand.index')->with('brands', $brands);
    }

    function destroy($id)
    {
        if (!Brand::check_goods($id)) {
            return back()->with('msg', '当前品牌下有商品，请先将对应商品删除后再尝试删除~');
        }

        Brand::destroy($id);
        return redirect(route('admin.brand.index'));

    }

    function sort_order(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->update(['sort_order' => $request->sort_order]);
    }
    function is_show(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->update(['is_show' => $request->is_show]);
    }

    function del_select(Request $request)
    {
        $del_id = $request->del_id;
        Brand::destroy($del_id);
    }


}
