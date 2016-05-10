<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Express;

class ExpressController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_express' => 'open active','_b' =>'block','_e' =>'active']);
    }
    function index()
    {
        $expresses = Express::orderBy('id', 'asc')->paginate(config('shop_express.page_size'));
        return view('admin.express.index', ['expresses' => $expresses]);
    }

    function create()
    {
        $expresses = config('shop_express.expresses');
        return view('admin.express.create', ['expresses' => $expresses]);
    }


    function store(Request $request)
    {
        $expresses = config('shop_express.expresses');
        $name = $expresses["$request->key"];
        $data = array_add($request->all(), 'name', $name);
        Express::create($data);
        return redirect(route('admin.express.index'))->with('info', '新增物流成功~');
    }

    function edit($id)
    {
        $expresses = config('shop_express.expresses');
        $express = Express::find($id);
        return view('admin.express.edit', ['expresses' => $expresses,'express' => $express]);
    }

    public function update(Request $request)
    {
        $express = Express::find($request->id);
        $express->update($request->all());
        return redirect(route('admin.express.index'))->with('msg', '修改物流信息成功');;
    }

    public function destroy($id)
    {
        Express::destroy($id);
        return back()->with('msg', '删除物流成功');
    }

}
