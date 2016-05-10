<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>物流信息</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link rel="icon" type="image/png" href="/assets/favicon.ico">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/cart/index.css" media="all">
    {{-- <link rel="stylesheet" type="text/css" href="/assets/cart/index_1.css" media="all">--}}
    <script src="/assets/shop/js/fontSize.js"></script>
    <link rel="stylesheet" href="/assets/shop/flexslider/flexslider.css">
</head>
<body>
<div id="globalLoading" class="global-loading">
    <div class="global-loading-logo">
        <div id="globalLoadingAnim" class="global-loading-anim"></div>
    </div>
    <div class="global-loading-text">正在努力为您加载中...</div>
</div>
<script src="/assets/shop/js/loading.js"></script>
<div class="jd-safe-mode-box">
    <div class="jd-safe-mode-msg">
                <span>
                    <em></em>
                    <span class="msg-safe">您正在安全购物环境中，请放心购物</span>
                </span>
    </div>
</div>
{{--@if ($order->status >= 4)
    <div id="wrapper">
<iframe src="http://m.kuaidi100.com/index_all.html?type={{ $order->express->key}}&postid={{ $order->express_code}}" frameborder="0" width="100%" height="500"></iframe>

</div>--}}
{{--@elseif($order->status < 4)--}}
    <div id="emptyCart" style="">
        <div class="shp-cart-empty">
            <div class="empty-sign cart-empty-pic"></div>
            <div class="empty-warning-text"> 您还没有购买或是付款，先去挑几件中意的商品吧！
            </div>
            <div class="empty-btn-wrapper">
                <a href="/category" class="btn-jd-darkred btn-large">去逛逛</a>
            </div>
        </div>
    </div>
{{--@endif--}}


@include('layouts.path2')

<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>

</body>
</html>

