<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\System;
use App\User;
use Cache;
use Auth;
use Hash;
class SystemController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
        view()->share(['_system' => 'open active','_b' =>'block','_password' => 'active','_cache' => 'active','_edit' => 'active']);
    }

    function change_password()
    {
        return view('admin.system.change_password');
    }

    function cache()
    {
        return view('admin.system.cache');
    }
    function clear_cache()
    {
        Cache::flush();
        return back()->with('msg', '清除成功~');
    }

    //站点信息
    function edit_config()
    {
        $system = System::find(1);
        return view('admin.system.edit_config')
            ->with('system', $system);
    }
    //修改站点信息
    function update(Request $request)
    {
        $system = System::find(1);
        $system->update($request->all());
        return back()->with('msg', '修改成功~');
    }


    //修改密码
    function update_password(Request $request)
    {
        $admin = Auth::user();
        if(!Hash::check($request->old_password,$admin->password)){
            return back()->with('msg','原始密码错误~');
        }
        $this->validate($request,['old_password' => 'required',
                                  'password' => 'required|min:6|confirmed']);
        $admin = User::find($admin->id);
        $admin->fill(['password' => bcrypt($request->password)])->save();
        return redirect('/logout')->with('msg','修改成功！');
    }

    public function register()
    {
        return view('admin.system.register');
    }

    public function do_register(Request $request)
    {
        User::insert([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return back();
    }


}
