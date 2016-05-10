<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Cache;
use App\Http\Requests;
use EasyWeChat\Core\Exceptions\HttpException;

use EasyWeChat\Foundation\Application;

class ApiController extends CommonController
{

    private $menu;


    public function __construct()
    {
        parent::__construct();
        $wechat = new Application(Config('wechat'));
        $this->menu = $wechat->menu;
        view()->share(['_api' => 'open active','_i' =>'block','_api_edit' => 'active']);
    }

    //微信接口
    function index()
    {
        $api = config('wechat');
        //return $api;
        return view('admin.api.index')->with('api',$api);
    }

    function api_update(Request $request)
    {
        $api = "<?php
return [
    'use_alias'    => false,
    'app_id'       => '".$request->app_id."',
    'secret'       => '".$request->secret."',
    'token'        => '".$request->token."',
    'aes_key' => '".$request->aes_key."'
];";

        $shop_api = dirname(getcwd()).'/config/wechat.php';
        file_put_contents($shop_api, $api);

        return back();
    }


    function menu_edit()
    {
       try {
            $buttons = Cache::rememberForever('admin_api_menus', function () {
                $menus = $this->menu->all();
                return $menus->menu['button'];
            });
        } catch (HttpException $e) {
            $buttons = [];
        }

       //return $buttons;
        return view('admin.api.menu_edit')
            ->with('buttons', $buttons);

    }

    function menu_update(Request $request)
    {
//return $request->buttons;
        $buttons = wechat_menus($request->buttons);
//return $buttons;
        $this->menu->add($buttons);
        Cache::forget('admin_api_menus');
        return back()->with('msg', '您已成功设置菜单，请取消关注后，再重新关注~');
    }


}
