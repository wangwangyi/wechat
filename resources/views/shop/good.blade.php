<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品详情</title>
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
    <div class="page-product-view" data-log="商品详情">

        <div class="header">
            <div class="left">
                <a onclick="location.href='/'" class="icon icon-home"></a>
            </div>

            <div class="tit"></div>
            <div class="right">
                <a href="/good_search" >
                    <div class="icon icon-search"></div>
                </a>
            </div>
        </div>

        <div class="product-view">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($good_galleries as $p)
                            <li>
                                <a href="javascript:void(0)"><img src="{{$p->imgs}}"  style="width:300px;height:300px;margin:0 auto;"/></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <div class="b2">
                <div class="b21">
                    <div class="b211">
                        <div class="name"><p>{{$good->name}}</p></div>
                        <div class="price"><strong>{{doubleval($good->price)}}元</strong></div>
                    </div>
                    <div class="b212">
                        <div class="icon-fenxiang"></div>
                    </div>
                </div>

            </div>
            <div class="mt20" style="display: none;"></div>


            <ul class="b3" style="display: none;">
                <li><span>通用</span></li>
            </ul>

            <div class="ui-b7">
                <h3>为您推荐</h3>
                <div class="ui-carousel-container">
                    <div class="ui-carousel-viewport">
                        @foreach($recommends as $p)
                            <a href="/good/{{$p->id}}">
                                <img src="{{$p->thumb}}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="b5">
                <div class="b51"></div>
                <div class="b52">
                    <div class="b22">
                        <p>{!!$good->desc!!}</p>
                    </div>
                </div>
            </div>
            <div class="b7">
                <div class="b70">
                    <a href="/">
                        <div class="icon-home"></div>
                    </a>
                </div>
                <div class="b72">
                    @if($good->inventory == 0)
                        <a href="javascript:;" class="off">暂时缺货</a>
                    @else
                        <a href="javascript:;" id="add_to_cart">立即购买</a>
                    @endif
                </div>

                <div class="b73">
                    <a href="/cart">
                        <div class="icon-gouwuche"></div>
                    </a>
                </div>
            </div>
            <a href="javascript:;" id="top" style="visibility: hidden;">
                <img src="/assets/wechat/images/top.png">
            </a>
        </div>
        <div class="share-component"></div>
    </div>
</div>

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script defer src="/assets/shop/flexslider/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            directionNav: false
        });
    })
</script>
<script>
    $(function () {
        $("#add_to_cart").click(function () {
            $.ajax({
                type: 'POST',
                url: '/cart',
                data: {good_id: "{{$good->id}}"},
                success: function (data) {
//                        console.log(data);
                    location.href = '/cart';
                }
            })
        })
    })
</script>
</body>
</html>