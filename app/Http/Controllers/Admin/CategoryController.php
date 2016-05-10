<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Type;
use App\Models\Attribute;
use Cache;

class CategoryController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_good' => 'open active','_a' =>'block','_cate' => 'active']);
    }
    private function messages()
    {
        return [
            'name.required' => '分类名称不能为空！',
        ];
    }

    function index()
    {
        $categories = Category::get_categories();
        Cache::forget('admin_category_categories');
        return view('admin.category.index')->with('categories', $categories);
    }

    function create()
    {
        Cache::forget('admin_category_categories');

        $categories = Category::get_categories();
        $types = Type::with("attributes")->get();
        return view('admin.category.create')->with('categories', $categories)
                                                ->with('types',$types);
    }
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Cache::forget('admin_category_categories');
        Category::create($request->all());
        return redirect(route('admin.category.index'))->with('msg', '新增成功！');
    }

    function is_show(Request $request)
    {
        Cache::forget('admin_category_categories');
        $category = Category::find($request->id);
        $category->update(['is_show' => $request->is_show]);
    }

    function destroy($id)
    {
        /*$category = Category::where("parent_id","=",$id)->get();
        if(count($category)>0){
            return "<script>alert('请先删除子栏目');location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        } else{
            Category::destroy($id);
            Cache::forget('admin_category_categories');
            return redirect(route('admin.category.index'));
        }*/

        if (!Category::check_children($id)) {
            return back()->with('msg', '当前分类有子分类，请先将子分类删除后再尝试删除~');
        }

        if (!Category::check_goods($id)) {
            return back()->with('msg', '当前分类有商品，请先将对应商品删除后再尝试删除~');
        }

        Category::destroy($id);
        Category::clear();
        return back()->with('smsg', '删除成功');
    }

    function edit($id)
    {
        $categories = Category::get_categories();
        $category = Category::find($id );
        $types = Type::with("attributes")->get();
        Cache::forget('admin_category_categories');
        return view('admin.category.edit')->with('category',$category)
                                             ->with('categories', $categories)
                                             ->with('types',$types);
    }
    function update(Request $request)
    {
        $category =Category::find($request->id);
        $category->update($request->all());
        Cache::forget('admin_category_categories');
        return redirect(route('admin.category.index'))->with('msg', '编辑成功！');
    }

}
