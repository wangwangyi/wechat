<?php

/**
 * xWechat 微信系统
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    //微信接口
    Route::get('/api/menu_edit', 'ApiController@menu_edit');
    Route::put('api', 'ApiController@api_update');
    Route::put('/api/menu', 'ApiController@menu_update');
    Route::resource('api', 'ApiController');

});




