<?php
Route::group(['namespace' => 'Shop'], function () {
    //用户授权
    Route::group(['middleware' => 'wechat.oauth'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('content', 'IndexController@content');
    Route::get('express', 'IndexController@express');
    Route::post('/', 'IndexController@index');
    Route::get('category', 'IndexController@category');
    //   Route::get('good_list/{category_id}', 'IndexController@good_list');
    Route::get('cart', 'CartController@cart');


    Route::get('good_list/{category_id}', [
        'as' => 'good_list', 'uses' =>  'IndexController@good_list'
    ]);

    Route::get('good/{id}', [
        'as' => 'good', 'uses' =>  'IndexController@good'
    ]);

    Route::get('good_search', 'SearchController@good_search');
    Route::get('/search/good_list', 'SearchController@search');

    Route::post('cart', 'CartController@store');
    Route::patch('cart', 'CartController@change_num');
    Route::delete('cart', 'CartController@destroy');

    /*Route::get('/lists', 'AddressController@lists');*/

    //管理地址
    /*Route::get('/manage', 'AddressController@manage');
    Route::get('/address/create', 'AddressController@create');
    Route::get('/{id}/edit', 'AddressController@edit');*/

    Route::get('/address', 'AddressController@index');
    Route::get('/address/create', 'AddressController@create');
    Route::get('/address/edit', 'AddressController@edit');
    Route::post('/address', 'AddressController@store');
    Route::patch('/order/checkout', 'AddressController@default_address');

    Route::get('order', 'OrderController@index');
    //生成订单,支付
    Route::post('/order', 'OrderController@store');
    Route::get('/order/checkout', 'OrderController@checkout');
    //我的订单
    Route::get('order/show/{id}', 'OrderController@show');

    Route::get('order/pay/{id}', 'OrderController@show_pay');
    //删除订单
    Route::delete('/order/{id}', 'OrderController@destroy');

    Route::get('/address/manage', 'AddressController@manage');
//改变默认地址
    Route::patch('/address', 'AddressController@default_address');
    Route::resource('address', 'AddressController');


    Route::get('user', 'Weixin_userController@user');
    });
});