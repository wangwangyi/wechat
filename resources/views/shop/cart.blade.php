<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>购物车</title>
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
@if (!count($carts) == 0)
<div id="wrapper">
    <div class="cart-index">
        <div class="cart-index-wrap">
            <div class="cart-list">
                <ul>
                    @foreach($carts as $cart)
                    <li class="item">
                        <div class="ui-box">
                            <div class="imgProduct">
                                <a href="/1/#/product/view?product_id=1153200008"><img
                                            src="{{$cart->good->thumb}}"></a></div>
                            <div class="info ui-box-flex">
                                <div class="name">
                                    <span>{{$cart->good->name}}</span>
                                </div>
                                <div class="price">
                                    <p>
                                        <span>售价：</span><span>{{doubleval($cart->good->price)}}元</span>
                                        <span>合计：</span><span class="hj">{{doubleval($cart->good->price) * $cart->number}}元</span>
                                    </p>
                                    <div class="tip">
                                        <span style="display: none;">请于2016/04/11 00:58前下单，逾期将失效。</span>
                                    </div>
                                </div>
                                <div class="num" data-id="{{$cart->id}}" data-price="{{$cart->good->price}}">
                                    <div class="xm-input-number">
                                        <div class="input-sub @if($cart->number > 1) active @endif"></div>
                                        <div class="input-num"><span>{{$cart->number}}</span></div>
                                        <div class="input-add active"></div>
                                    </div>
                                    <div class="delete">
                                        <a href="javascript:;">
                                            <span class="icon-iconfontshanchu"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="append"></div>
                    </li>
                  @endforeach
                </ul>
            </div>
            <div class="pointBox">
                <div class="point" style="display: none;"><span class="act act_special">包邮</span><span></span></div>
                <div class="point">
                    <p>温馨提示：产品是否购买成功，以最终下单为准，请尽快结算</p>
                </div>
            </div>

            <!-- Navbar -->
            <div class="bottom-submit ui-box">
                <div class="price">
                    <span id="num">共{{$count['number']}}件 金额：</span><br>
                    <strong id="total_price">{{doubleval($count['total_price'])}}</strong><span>元</span>
                </div>
                <div class="btn">
                    <a class="ui-button ui-button-disable" href="/category"><span>继续购物</span></a>
                </div>
                <div class="btn">
                    <a class="ui-button" href="/order/checkout"><span>去结算</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(count($carts) == 0)
    <div id="emptyCart" style="">
        <div class="shp-cart-empty">
            <div class="empty-sign cart-empty-pic"></div>
            <div class="empty-warning-text"> 购物车还是空的，去挑几件中意的商品吧！
            </div>
            <div class="empty-btn-wrapper">
                <a href="/category" class="btn-jd-darkred btn-large">去逛逛</a>
            </div>
        </div>
    </div>
@endif


@include('layouts.path2')
<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script>
    $(function () {
        var n =$(".input-num span").text();
        if(n == ''){
            $(".input-num span").text(0);
        }

        //删除

        $(".delete").click(function () {
            var _this = $(this);

            $.ajax({
                type: 'DELETE',
                url: '/cart',
                data: {id: _this.parents(".num").data('id')},
                success: function (data) {
                    var length = $(".item").length;
                    if (length == 1) {
                        $('#carts').hide();
                        $('#more').show();
                        return false;
                    }
                    $("#num").text("共" + data.number + "件 金额:");
                    $("#total_price").text(data.total_price);

                    _this.parents('.item').remove();

                }
            })
        })

        //增加数量
        $(".input-add").click(function () {
            var _this = $(this);

            var $num = _this.siblings('.input-num').children('span');
            var $sub = _this.siblings('.input-sub');
            var price = _this.parents(".num").data('price');

            var num = $num.text();
            num = parseInt(num) + 1;
            $num.text(num);

            var hj = num * parseInt(price);
            _this.parents('.info').find('.hj').text(hj + '元');

            if (!$sub.hasClass('active')) {
                $sub.addClass('active');
            }

            $.ajax({
                type: 'PATCH',
                url: '/cart',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'add'
                },
                success: function (data) {
                    $("#num").text("共" + data.number + "件 金额:");
                    $("#total_price").text(data.total_price);
                }
            })
        })


        //减少数量
        $(".input-sub").click(function () {
            var _this = $(this);
            var $num = _this.siblings('.input-num').children('span');
            var num = $num.text();
            var price = _this.parents(".num").data('price');

            if (num == 1) {
                return false;
            }

            num = parseInt(num) - 1;
            if (num == 1) {
                _this.removeClass('active');
            }

            $num.text(num);

            var hj = num * parseInt(price);
            _this.parents('.info').find('.hj').text(hj + '元');

            $.ajax({
                type: 'PATCH',
                url: '/cart',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'sub'
                },
                success: function (data) {
                    $("#num").text("共" + data.number + "件 金额:");
                    $("#total_price").text(data.total_price);
                }
            })
        })

    })
</script>
</body>
</html>

