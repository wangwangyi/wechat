<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Models\Type;
use App\Models\Attribute;
class AttributeController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_good' => 'open active','_a' =>'block','_type' => 'active']);
    }
    private function messages()
    {
        return [
            'name.required' => '分类名称不能为空！',
        ];
    }

    public function index($type_id)
    {
         $types = Type::all();
        $attributes = Attribute::with('type')->where('type_id', $type_id)->get();
//        return $attributes;

        return view('admin.attribute.index', ['types' => $types, 'type_id' => $type_id, 'attributes' => $attributes]);
    }

    public function create($type_id)
    {
        $types = Type::all();
        return view('admin.attribute.create', ['types' => $types, 'type_id' => $type_id]);
    }

    public function store(Request $request, $type_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Attribute::create($request->all());
        return redirect(route('admin.type.{type_id}.attribute.index', $request->type_id));
    }
}
