<?php
require 'Routes/Home/wechat_api.php';

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');

    //微信
    require 'Routes/Home/wechat.php';

    Route::group(['middleware' => ['auth']], function () {
        //xWechat 微信系统
        require 'Routes/Admin/xWechat.php';


        Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => 'auth','csfr'], function () {



            //后台首页
            Route::get('/', 'IndexController@index');
            Route::get('user', 'IndexController@user');

            //可视化接口
            //      Route::get('sales_count', 'VisualizationController@sales_count');
            Route::get('/visual/sales_amount', 'VisualController@sales_amount');
            Route::get('/visual/sales_count', 'VisualController@sales_count');
            Route::get('/visual/top', 'VisualController@top');



            //系统信息
            Route::get('/system/change_password', 'SystemController@change_password');
            Route::get('/system/cache', 'SystemController@cache');
            Route::get('/system/edit_config', 'SystemController@edit_config');
            Route::get('/system/clear_cache', 'SystemController@clear_cache');
            Route::patch('/system/change_password', 'SystemController@update_password');
            Route::get('/system/register', 'SystemController@register');
            Route::post('do_register', 'SystemController@do_register');
            Route::put('/system/update', 'SystemController@update');



            //商品品牌
            Route::patch('/brand/sort_order', 'BrandController@sort_order');
            Route::patch('/brand/is_show', 'BrandController@is_show');
            Route::delete('/brand/del_select', 'BrandController@del_select');
            Route::resource('brand', 'BrandController', ['except' => ['show']]);

            //商品分类
            Route::patch('/category/is_show', 'CategoryController@is_show');
            Route::resource('category', 'CategoryController');

            //文章
            Route::resource('article', 'ArticleController');

            //商品列表
            Route::get('/good/{id}/restore', 'GoodController@restore');
            Route::delete('/good/{id}/forceDelete', 'GoodController@forceDelete');

            Route::get('/good/{id}/destroy', 'GoodController@destroy');
            // Route::get('/good/search', 'GoodController@search');
            Route::get('/good/trash', 'GoodController@trash');

            Route::delete('/good/del', 'GoodController@del');

            Route::patch('/good/onsale', 'GoodController@onsale');
            Route::patch('/good/change_attr', 'GoodController@change_attr');
            Route::delete('/good/del_select', 'GoodController@del_select');
            Route::delete('/good/select_del', 'GoodController@select_del');
            Route::delete('/good/select_restore', 'GoodController@select_restore');
            Route::patch('/type/change_price', 'GoodController@change_price');
            Route::resource('good', 'GoodController');

            //商品类型
            Route::patch('/type/change_name', 'TypeController@change_name');
            Route::resource('type', 'TypeController');

            //订单管理

            Route::patch('/order/picking', 'OrderController@picking');
            Route::patch('/order/shipping', 'OrderController@shipping');

            Route::resource('order', 'OrderController');

            //商品属性，需要加入商品类型的id
            Route::group(['prefix' => 'type/{type_id}'], function () {
                Route::delete('del_all', [
                    'as' => 'admin.type.{type_id}.attribute.del_all', 'uses' => 'AttributeController@del_all'
                ]);
                Route::resource('attribute', 'AttributeController', ['except' => ['show']]);
            });


            //物流管理
            Route::resource('express', 'ExpressController');

            //广告管理
            Route::patch('/advertise/is_show', 'AdvertiseController@is_show');
            Route::resource('advertise', 'AdvertiseController');



            //会员管理

            Route::resource('weixin_user', 'Weixin_userController');


        });



    });

    Route::post('/upload', 'FileController@upload');

    Route::post('/upload_icon', 'FileController@upload_icon');
});





