<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>
       用户中心
    </title>
    <meta name="author" content="m.jd.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">




    <link rel="stylesheet" type="text/css" href="/assets/shop/assets/css/user.css" media="all">
</head>
<body id="body">

<input id="huiyuan_sid" value="14d019779b6974e619352bf5fa98f838" type="hidden">

<div class="common-wrapper">

    <div class="head-img">
        <span class="my-img"
                  style="background-image: url('{{$headimgurl}}');"></span>

        <p></p>

    </div>

    <ul class="padding-list current-half-width">
        <li>
            <a id="wait4Payment"
               href="">
                <p id="wait4PaymentSum">{{$order}}</p>

                <p>待付款</p>
            </a>
        </li>
        <li>
            <a id="wait4Delivery"
               href="">
                <p id="wait4DeliverySum">0</p>

                <p>待收货</p>
            </a>
        </li>

    </ul>

    <ul class="menu-list">
        <li>
            <a id="quanbudingdan"
               href="/order">
                <img src="/assets/shop/assets/img/547bc6b5ncc52a3b8.png" alt="">

                <p>全部订单</p>
            </a>
        </li>

        <li>
            <a id="wodeqianbao"
               href="">
                <img src="/assets/shop/assets/img/547bc6dbn3dabf32a.png" alt="">

                <p>我的钱包</p>
            </a>
        </li>

        <li>
            <a id="liulanjilu"
               href="">
                <img src="/assets/shop/assets/img/547bc70anf7e3462a.png" alt="">

                <p>浏览记录</p>
            </a>
        </li>


        <li>
            <a id="wodeyuyue"
               href="">
                <img src="/assets/shop/assets/img/547bc75fnc5c6209c.png" alt="">

                <p>我的预约</p>
            </a>
        </li>


    </ul>


</div>
@include('layouts.path')

<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
</body>
</html>
