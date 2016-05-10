<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
/*use Cache;*/
use App\Http\Requests;
use App\Models\Address;
use App\Models\Weixin_user;

class AddressController extends CommonController
{

    function index()
    {
        $addresses = Address::where('weixin_user_id', $this->weixin_user->id)->get();
        return view('shop.address.index')->with('addresses',$addresses);
    }

    function create()
    {
        /*$addresses = Cache::rememberForever('admin_address_addresses', function () {
            return Province::with('cities')->get();
        });
        return $addresses;*/
        return view('shop.address.create')/*->with('p',$p)*/;
    }


    function store(Request $request)
    {
        $pca = explode(" ", $request->pca);

        Address::create([
            'weixin_user_id' => $this->weixin_user->id,
            'name' => $request->name,
            'province' => $pca[0],
            'city' => $pca[1],
            'area' => $pca[2],
            'tel' => $request->tel,
            'detail' => $request->detail,
        ]);
    }


    //设置用户的默认地址
    function default_address(Request $request)
    {
        Weixin_user::where('id', $this->weixin_user->id)->update(['address_id' => $request->address_id]);

        //重新设置session
        $weixin_user = session()->get('weixin_user');
        $weixin_user['address_id'] = $request->address_id;
        session()->put('weixin_user', $weixin_user);
    }



    function edit($id)
    {
        $address = Address::find($id);
        return view('shop.address.edit')->with('address', $address);
    }

    function update(Request $request, $id)
    {
        $pca = explode(" ", $request->pca);

        Address::where('id', $id)
            ->update([
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
            ]);
    }

    function manage()
    {
        $addresses = Address::where('weixin_user_id', $this->weixin_user->id)->get();
      //  return $addresses;
        return view('shop.address.manage')->with('addresses', $addresses);
    }

}
