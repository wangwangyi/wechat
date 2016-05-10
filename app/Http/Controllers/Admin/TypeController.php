<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Type;
class TypeController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_good' => 'open active','_a' =>'block','_type' => 'active']);
    }

    function index()
    {
        $types = Type::with('attributes')->get();
        return view('admin.type.index')->with('types',$types);
    }

    function create()
    {
        return view('admin.type.create');
    }

    function store(Request $request)
    {
        Type::create($request->all());
        return redirect(route('admin.type.index'))->with('msg', '新增成功！');
    }

    function change_name(Request $request)
    {
        $type = Type::find($request->id);
        $type->update(['name' => $request->name]);
    }

    function destroy($id)
    {
        Type::destroy($id);
        return redirect(route('admin.type.index'));
    }


}
