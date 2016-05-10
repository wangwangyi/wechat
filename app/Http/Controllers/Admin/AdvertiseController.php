<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Advertise;
use App\Models\Category;
class AdvertiseController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_adv' => 'active']);
    }
    function index()
    {
        $advertises = Advertise::where("parent_id","=",0)->get();
        foreach ($advertises as &$c)
        {
            $c["children"] = Advertise::where("parent_id","=",$c["id"])->get();
        }
        return view('admin.advertise.index')->with('advertises',$advertises);
    }
    function create()
    {
        $advertises = Advertise::where("parent_id","=",0)->get();
        $categories = Category::get_categories();
        return view('admin.advertise.create')->with('advertises',$advertises)
                                                 ->with('categories',$categories);
    }

    function store(Request $request)
    {
        Advertise::create($request->all());
        return redirect(route('admin.advertise.index'));
    }

    function edit($id)
    {
        $advertises = Advertise::where("parent_id","=",0)->get();
        $categories = Category::get_categories();
        $advertise = Advertise::find($id);
        return view('admin.advertise.edit')->with('advertise',$advertise)
                                              ->with('advertises',$advertises)
                                              ->with('categories',$categories);
    }
    function update(Request $request)
    {
      $advertise =Advertise::find($request->id);
        $advertise ->update($request->all());
        return redirect(route('admin.advertise.index'));
    }

    function is_show(Request $request)
    {
        $advertise = Advertise::find($request->id);
        $advertise->update(['is_show' => $request->is_show]);
    }
    function destroy($id)
    {
        Advertise::destroy($id);
        return redirect(route('admin.advertise.index'));

    }

}
