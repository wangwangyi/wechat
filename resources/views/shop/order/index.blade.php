<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>订单列表</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link rel="icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/assets/shop/flexslider/flexslider.css">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <script src="/assets/shop/js/fontSize.js"></script>

</head>
<body>
<div id="globalLoading" class="global-loading">
    <div class="global-loading-logo">
        <div id="globalLoadingAnim" class="global-loading-anim"></div>
    </div>

</div>



<div id="wrapper">
    <div class="cart-index" id="more" @if (!$orders->isEmpty()) style="display: none;" @endif>
        <div style="height:1rem;"></div>

        <div class="cart-index-wrap">
            <div class="empt">
                <div class="b3">
                    <a href="/product/category" class="ui-button ui-button-disable">
                        <span>全部商品</span>
                    </a>
                    <a href="/" class="ui-button">
                        <span>精选商品</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-my-order" data-log="我的订单" @if ($orders->isEmpty()) style="display: none;" @endif>

        <div class="order_list">

            @foreach($orders as $order)
                <div class="ol-item" onclick="location.href='/order/show/{{$order->id}}'">
                    <div>
                        <div class="oi1">
                            <div class="oi11">
                                <div class="oi111"><p>
                                        <strong>订单日期：</strong><span>{{$order->created_at->format('Y/m/d H:i')}}</span>
                                    </p></div>
                                <div class="oi112"><p><strong>订单编号：</strong><span>{{$order->id}}</span></p></div>
                            </div>
                            <div class="oi12"><p>{{$order_status["$order->status"]}}</p></div>
                        </div>
                        <div class="oi2">
                            <ul>
                                @foreach($order->order_goods as $order_good)
                                    <li>
                                        <div class="oi21">
                                            <div class="img"><img src="{{$order_good->good->thumb}}">
                                            </div>
                                        </div>
                                        <div class="oi22"><p>{{$order_good->good->name}}</p></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="oi3">
                            <p>
                                <span>共{{count($order->order_goods)}}件商品</span>
                                <span>总金额：</span><strong>{{doubleval($order->total_price)}}元</strong>
                            </p>
                        </div>

                        @if($order->status=='1')
                            <div class="oi4">

                                <a href="/order/pay/{{$order->id}}" class="org">立即付款</a>
                                <a href="/order/{{$order->id}}" data-method="delete">取消订单</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>

<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>

<script>
    $(function () {
        $('.save-button').click(function () {
            var data = $("input").serialize();

            $.ajax({
                type: "POST",
                url: "/address",
                data: data,
                success: function (data) {
//                        console.log(data);
                    location.href="/address";
                }
            })
        })
    })
</script>
</body>
</html>