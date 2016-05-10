<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>搜索商品</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/assets/shop/assets/favicon.ico">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <script src="/assets/shop/js/fontSize.js"></script>

</head>
<body>
<div id="wrapper">
    <div class="page-search" data-log="搜索页">

        <form action="/search/good_list" method="get">
            <div class="header">
                <div class="left">
                    <a href="/" title="小米商城" data-log="HEAD-首页" class="home">
                        <span class="icon-home icon"></span>
                    </a>
                </div>
                <div class="tit">
                    <div class="searchword"><input autofocus="autofocus" name="keyword"></div>
                </div>
                <div class="searchlabel">
                    <button type="submit" style="border: 0px;background: #F5F5F5;"><span class="icon icon-search"></span></button>

                </div>
            </div>
        </form>

        <div>
            <ul class="list-default">
                @foreach ($good as $g)
                <li class="top">
                   <a href="{{url('good', $g->good->id)}}"><span>{{$g->good->name}}</span></a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
</body>
</html>
