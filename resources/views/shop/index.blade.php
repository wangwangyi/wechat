<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>购物商城</title>
    <meta name="author" content="m.jd.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="author" content="m.jd.com">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="description" content="">
    <meta name="Keywords" content="">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/shop/assets/css/index.css" media="all">
    <link rel="stylesheet" type="text/css" href="/assets/shop/assets/css/good.css" media="all">
    <script src="/assets/shop/js/fontSize.js"></script>
</head>
<body class="mhome hide-landing">

<div class="index-header">
    <div class="search_bar">
        <a href="/good_search">
            <span class="icon icon-search"></span>
            <span class="text">搜索商品名称</span>
        </a>
    </div>
    <div class="search_bottom"></div>
</div>

<div id="scwrapper" class="scroll-wrapper">


    <div class="viewport-new" id="newviewport">
        <header id="search-bar" class="  search-bar-hidden" style="height: 44px;">
        </header>

        <div class="floor new-slider-floor bdr-bottom">

            <div style="cursor: pointer; height: 311px;" id="slider" class="slider-wrapper">
                <ul style="min-height: 0px; width: 5120px; height: 311px;" id="slider_touch" class="new-slide" data-slide-ul="firstUl">

                    @foreach ($advertises as $advertise)
                    <li style="transition: all 0ms ease 0s; height: 311px; width: 640px; position: absolute;left:0px; top: 0px; transform: translate3d(0px, 0px, 0px); z-index: 9;" data-ul-child="child" class="slide-li">
                        <a class="J_ping"  href="{{url('good_list', $advertise->category_id)}}">
                            <img style="width: 640px;" alt="" src="{{$advertise->thumb}}">
                        </a>
                    </li>
                        @endforeach
                </ul>
                <div class="focus-btn" data-small-btn="smallbtn">
                    <span class="active" data-ol-btn="btn"></span>
                    <span class="" data-ol-btn="btn"></span>
                    <span class="" data-ol-btn="btn"></span>
                    <span class="" data-ol-btn="btn"></span>
                </div>
            </div>

            <nav class="quick-entry-nav">
                <a class="quick-entry-link fz12 J_ping"  href="/category">
                    <img src="/assets/shop/assets/img/56be05dcn94355bd6.png" height="45" width="45">
                    <span>分类查询</span>
                </a>
                <a class="quick-entry-link fz12 J_ping"  href="/express">
                    <img src="/assets/shop/assets/img/56be05fdndb68df6a.png" height="45" width="45">
                    <span>物流查询</span>
                </a>
                <a class="quick-entry-link fz12 J_ping"  href="/cart">
                    <img src="/assets/shop/assets/img/56be0620n63774172.png" height="45" width="45">
                    <span>购物车</span>
                </a>
                <a class="quick-entry-link fz12 J_ping"  href="/user">
                    <img src="/assets/shop/assets/img/56be0635n1751d492.png" height="45" width="45">
                    <span>用户信息</span>
                </a>
            </nav>
        </div>

        <div class="floor">
            <div class="floor-container   seckill-floor bdr-bottom">
                <div class="title-wrap">
                    <span class="seckill-icon"></span>
                    <h2 class="seckill-title">掌上秒杀</h2>
                    <div class="seckill-timer time" id="seckill_time">
                        <span class="seckill-time  seckill-time-right" id="t_h">00</span>
                        <span class="seckill-time-separator">:</span>
                        <span class="seckill-time seckill-time-right" id="t_m">58</span>
                        <span class="seckill-time-separator">:</span>
                        <span class="seckill-time seckill-time-right" id="t_s">21</span>
                    </div>
                    <span id="seckill_loading"></span>
                </div>
                <div class="seckill-new-container">
                    <ul style="width: 3983.33px; transition: all 0.3s ease 0s; transform: translate3d(0px, 0px, 0px);" id="seckillul" class="seckill-new-list">
                        @foreach ($banners as $banner)
                        <li style="width: 196.667px;" class="seckill-new-item">
                            <div class="seckill-item-img bdr-r">
                                <a  href="{{url('good_list',$banner->category_id)}}" class="seckill-new-link J_ping">
                                    <img style="height: 174px;" src="{{$banner->thumb}}" class="seckill-photo" border="0" width="100%">
                                    <div class="seckill-tip tagType-seckill-2 tagCount-seckill-3">
                                        @if($banner->adv == 0) 热卖
                                        @elseif($banner->adv == 1) 超值
                                        @elseif($banner->adv == 2) 推荐@endif</div>
                                </a>
                            </div>
                            <div class="seckill-item-price">
                                <span class="seckill-new-price">¥184</span>
                                <span class="seckill-original-price">¥189</span>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                </div>
            </div>


        </div>


        <div class="floor">
            <div class="floor-title">
                <div class="floor-title-container font-col-hybrid   bdr-bottom ">
                    <span>特色市场</span>
                    <div class="title-more-link"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="floor-container bdr-bottom">
                <div class="floor-item">
                    @foreach ($food as $f)
                    <div class="container-col02 bdr-r">
                        <a href="{{url('good_list',$f->category_id)}}" class="J_ping">
                            <img src="{{$f->thumb}}">
                        </a>
                    </div>
                    @endforeach
                    <div class="container-col02">
                        @foreach ($foods as $food)
                        <div class="container-col01 bdr-bottom">
                            <a href="{{url('good_list',$food->category_id)}}" class="J_ping">
                                <img src="{{$food->thumb}}">
                            </a>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
            <div class="floor-container bdr-bottom">
                <div class="floor-item">
                    @foreach ($t as $z)
                    <div class="container-col02 bdr-r">
                        <a href="#" class="J_ping">
                            <img src="{{$z->thumb}}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="floor">

            <div class="floor">
                <div class="floor-title">
                    <div class="floor-title-container font-col-hybrid ">
                        <span>品牌推荐</span>
                        <div class="title-more-link"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="floor-container  brand-remmd-bg">
                    <div class="floor-item brand-remmd-item ">
                        @foreach ($brand as $a)
                        <div class="contianer-brand01 brand-remmd-r">
                            <a  href="{{url('good',$a->id)}}" class="J_ping">
                                <img src="{{$a->thumb}}">
                            </a>
                        </div>
                        @endforeach
                        <div class="contianer-brand02">
                            @foreach ($brands as $b)
                            <div class="container-col02 brand-remmd-r">
                                <a  href="{{url('good_list',$b->category_id)}}" class="J_ping">
                                    <img src="{{$b->thumb}}">
                                </a>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div id="recommend" class="floor love-floor">
                <h2 style="padding-bottom: 0px;" class="love-floor-title login-before">猜你喜欢</h2>
                <ul class="love-list" id="recommendList">
                    @foreach ($best_goods as $best)
                        <li class="love-item">
                            <a class="J_ping"   href="{{url('good',$best->id)}}">
                                <div alt="" class="love-item-pic" style="width: 207px; height: 207px;">
                                    <img  src="{{$best->thumb}}" imgsrc="{{$best->thumb}}">
                                </div>
                                <div class="love-item-title"><span>{{$best->name}}</span></div>
                            </a>

                            <div class="love-item-bottom">
                                <span class="love-item-price">￥<i>{{$best->price}}</i></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div style="clear: left;"></div>
            </div>

            <div id="recommend" class="floor love-floor">
                <h2 style="padding-bottom: 0px;" class="love-floor-title login-before">新品推荐</h2>
                <ul class="love-list" id="recommendList">
                    @foreach ($new_goods as $new)
                        <li class="love-item">
                            <a class="J_ping"   href="{{url('good',$new->id)}}">
                                <div alt="" class="love-item-pic">
                                    <img style="width: 207px; height: 207px;" src="{{$new->thumb}}" imgsrc="{{$new->thumb}}">
                                </div>
                                <div class="love-item-title"><span>{{$new->name}}</span></div>
                            </a>

                            <div class="love-item-bottom">
                                <span class="love-item-price">￥<i>{{$new->price}}</i></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div style="clear: left;"></div>
            </div>

            <div id="recommend" class="floor love-floor">
                <h2 style="padding-bottom: 0px;" class="love-floor-title login-before">热销</h2>
                <ul class="love-list" id="recommendList">
                    @foreach ($hot_goods as $hot)
                        <li class="love-item">
                            <a class="J_ping"   href="#">
                                <div alt="" class="love-item-pic">
                                    <img style="width: 207px; height: 207px;" src="{{$hot->thumb}}" imgsrc="{{$hot->thumb}}">
                                </div>
                                <div class="love-item-title"><span>{{$hot->name}}</span></div>
                            </a>

                            <div class="love-item-bottom">
                                <span class="love-item-price">￥<i>{{$hot->price}}</i></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div style="clear: left;"></div>
            </div>



        </div>

    </div>

    @include('layouts.path')

    <div  class="bottom-to-top J_ping" id="indexToTop" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1); display: none;">
        <img src="/assets/shop/assets/img/scroll-to-top-icon.png" style="width: 100%;">
    </div>

    <div id="fixedtop" class="showfixedtop-half" search_land_searchtransformation_show="true">
        <a id="layout_top" name="top"></a>

        <div style="display: block; z-index: 29; width: 100%; height: 50px; background-color: rgb(46, 46, 46);" id="download_banner">
            <div style="margin: 0px auto; width: 320px; height: 50px;">
                <img report-eventid="MDownLoadFloatTop_Close" class="J_ping" id="download_openweb" style="width: 13px; height: 13px; display: inline; margin: 18px 0px 0px 12px; float: left;" src="/assets/shop/assets/img/top-x.png">

                <div style="width: 155px; display: inline; float: left; text-align: center; color: rgb(255, 255, 255);"></div>

            </div>
        </div>

        <div id="index_search_main" search_land_searchtransformation_show="true" class="jd-header-home-wrapper">
            <div class="jd-search-container on-blur" id="index_search_head">
                <div style="opacity: 0;" class="jd-search-box-cover"></div>
                <div class="jd-search-box">
                    <div class="jd-search-tb">
                        <div class="jd-search-icon">
                            <span class="jd-search-icon-logo"><i class="jd-sprite-icon"></i></span>
                            <span id="index_search_bar_cancel" class="jd-search-icon-cancel"><i class="jd-sprite-icon"></i></span>
                        </div>
                        <a href="/good_search">
                        <form action="" id="index_searchForm" class="jd-search-form">

                            <div class="jd-search-form-box">
                                <span class="jd-search-form-icon jd-sprite-icon"></span>

                                <div class="jd-search-form-input">
                                        <input maxlength="20" autocomplete="off"  name="keyword" value=""
                                               placeholder="搜索商品" class="hilight1" type="text">
                                        <input value="" id="index_category" name="" style="display: none;" type="text">
                                </div>

                                <a href="javascript:void(0);" class="jd-search-icon-close jd-sprite-icon" id="index_clear_keyword"></a>
                                <a href="javascript:void(0)" id="index_search_submit" class="jd-search-form-action"><span class="jd-sprite-icon"></span></a>
                            </div>

                        </form>
</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script src="/assets/shop/assets/js/jquery-1.7.2.min.js" type="text/javascript"></script>

<script src="/assets/shop/assets/js/zepto.min.js" type="text/javascript"></script>
<script src="/assets/shop/assets/js/mbase.js" type="text/javascript"></script>
<script src="/assets/shop/assets/js/base.js" type="text/javascript"></script>

<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>


<script type="text/javascript" src="/assets/shop/assets/js/index_2016_1_24.js" charset="GBK"></script>
<script>
    //轮播图
    $(function () {
        var jsArgs = {};
        jsArgs['index'] = {
            sliderImgList: [{
                url: '#',
                title: '母婴节M',
                img: '/assets/shop/assets/img/1.jpg'
            }, {
                url: '',
                title: '京东快报',
                img: '/assets/shop/assets/img/1.jpg'
            },],


            downloadHideTime: 1,
            downloadHideTime: 1,
            indexFloatLayer: {url: '0'},
            searchland: {
                hotKeyword: ["iPhone SE", "充值", "零食", "新品手机", "电磁炉", "保温杯", "大米", "耳机", "玻璃水", "巧克力", "方便面", "饼干"],
                searchBoxWord: '{"rate":"05","realWord":"","showWord":"","code":"0"}'
            },
            recommend: {open: true, useCached: false, pin: ''},
            fireworks: {open: false, dir: '//st.360buyimg.com/m'},
            appBanner: {isOpen: true, indexClientType: 1},
            url: '',
            autoSeckill: true
        };
        jsArgs['html5_2015'] = {head: false, footer: {toPcHomeUrl: null}, appDown: null};
        M.setRunMod(['html5_2015']);

        M.setRunMod('index');
        jsArgs['BuriedPoint'] = '';
        M.setRunMod(['BuriedPoint']);
        M.setRunMod(['JaRequire']);
        M.runner(jsArgs);
    });
</script>



<script>
    //计时
    function GetRTime(){
        var EndTime= new Date('2055/11/29 00:00:00');
        var NowTime = new Date();
        var t =EndTime.getTime() - NowTime.getTime();
        var h=0;
        var m=0;
        var s=0;
        if(t>=0){
            h=Math.floor(t/1000/60/60%24);
            m=Math.floor(t/1000/60%60);
            s=Math.floor(t/1000%60);
        }


        document.getElementById("t_h").innerHTML = (h<10?"0"+h:h);
        document.getElementById("t_m").innerHTML = (m<10?"0"+m:m);
        document.getElementById("t_s").innerHTML = (s<10?"0"+s:s);
    }
    setInterval(GetRTime,0);
</script>


</body>
</html>
