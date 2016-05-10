<?php
//微信Api接口
Route::group(['namespace' => 'Shop', 'domain' => 'mi.xnvalley.com'], function () {
    //Api接口
    Route::any('wechat', 'WechatController@serve');
});