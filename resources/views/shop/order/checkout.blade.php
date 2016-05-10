<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>
        填写订单
    </title>
    <meta name="author" content="m.jd.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <!--测速埋点-->

    <link rel="stylesheet" type="text/css" href="/assets/order/index.css" media="all">
</head>
<body id="body">
<a name="top"></a>
<header>



    <div style="height: 100%; width: 100%; z-index: 1001; position: absolute; overflow: hidden; background: rgba(145, 145, 145, 0.1) none repeat scroll 0% 0%; display: none; top: 0px;"
         id="background">
    </div>

    <input id="couponsId" value="" type="hidden">

    <form method="post" action="" id="orderForm">

        <input name="submitVerify" value="psejSiEidPQFRkGmprPk6NRRuAPK670c" type="hidden">

        <div class="common-wrapper">
            <div class="w checkout" style="padding: 0px;">


                <div class="step1 border-1px" onclick="location.href='/address'">
                    <div class="m step1-in ">

                            <div class="mt_new">
                                <div class="s1-name">
                                    <span>wangyi</span>
                                </div>
                                <div class="s1-phone">
                                   13247139363
                                </div>

                                <div class="s1-default">
                                    默认
                                </div>


                            </div>

                            <div class="mc step1-in-con" id="address" data-id="{{$address->id or ''}}">

                                @if(!$address)
                                    <span style="color:#FF5722;">亲, 请先填写一个送货地址~</span>
                                @else
                                    {{$address->province or ''}} {{$address->city or ''}} {{$address->area or ''}} {{$address->detail or ''}}
                                @endif
                            </div>

                    </div>

                    <b class="s1-borderB"></b>
                    <span class="s-point"></span>
                </div>


                <div class="middle-box border-1px-top border-1px-bottom">



                    @foreach($carts as $cart)
                    <div class="step3 s-list commodity-list bg_sign"
                         onclick="">
                        <div class="s-item border-1px-bottom-middle">
                            <div class="box-container">
                                <div class="sitem-l">
                                    <div class="sl-img">
                                        <img src="{{$cart->good->thumb}}">
                                    </div>
                                </div>

                                <div class="sitem-m">
                                    <p class="sitem-m-txt">{{$cart->good->name}}</p>

                                    <p class="sitem-btm-detail">
                                        <span>×{{$cart->number}}</span>
                                        <span class="seven-return rtn-ok">
                                          支持7天无理由退货
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div id="moneyTip2" class="sitem-r cost-price">￥{{doubleval($cart->good->price)*$cart->number}}<i class="icon-detailed margrt"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="step2">
                        <a href=""
                           class="s-href">
                        </a>

                        <div class="pay-deliver"><a
                                    href=""
                                    class="s-href">
                            </a><a href=""
                                   class="pay-href">

                        <span class="pay-item">
                            <p class="pay-deliver-title">支付配送</p>
                            <p class="pay-deliver-way">
                                <span class="pay-way"> 微信支付</span>
                            </p>
                            <span class="point-left"></span>
                        </span>

                            </a>
                        </div>

                    </div>

                </div>

                <div class="step5 border-1px" id="yunfeeList" style="margin-bottom: 3.125em;">


                    <div class="s-item">
                        <div class="sitem-l">
                            商品金额
                        </div>
                        <div class="sitem-r">

                            ￥{{$count['total_price']}}

                        </div>
                    </div>
                    <div class="s-item">
                        <div class="sitem-l">
                            运费
                        </div>
                        <div class="sitem-r">

                            ￥0.00

                        </div>
                    </div>
                </div>
            </div>



            <div class="pay-bar" id="pay-bar">


                <div class="border-1px-top payb-con">
                    实付款：<span id="payMoney">￥
                <span class="big-price">{{$count['total_price']}}</span>.00</span>
                </div>

                <a class="payb-btn" id="pay">
                    提交订单
                </a>
                <input id="sid" value="339db76618eb179bf041051afa8a842c" type="hidden">
            </div>

            <!-- 弹层 -->

            <div class="popup-w" style="display: none;"></div>

        </div>

    </form>

</header>
<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script>
    $(function () {
        $("#pay").click(function () {
            var address_id = $("#address").data('id');
         //   console.log(address_id);
            if (address_id == '') {
                alert('请先填写一个送货地址~');
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '/order',
                data: {address_id: address_id},

                success: function (data) {
                    console.log(data);
                    if (data.status == '0') {
                        alert(data.info);
                    }

//微信支付
                    location.href='/order/pay/'+data.value;
                }
            })
        })
    });
</script>

</body>
</html>
