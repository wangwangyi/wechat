<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/assets/shop/flexslider/flexslider.css">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <script src="/assets/shop/js/fontSize.js"></script>
    @yield('css')
</head>
<body>
<div id="globalLoading" class="global-loading">
    <div class="global-loading-logo">
        <div id="globalLoadingAnim" class="global-loading-anim"></div>
    </div>
    <div class="global-loading-text">正在努力为您加载中...</div>
</div>
<script src="/assets/shop/js/loading.js"></script>


<div id="wrapper">
    @yield('content')
</div>

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
@yield('js')
</body>
</html>