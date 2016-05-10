<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品列表</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link rel="icon" type="image/png" href="/assets/favicon.ico">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <script src="/assets/shop/js/fontSize.js"></script>

</head>
<body>


<div id="wrapper">
    <div class="page-list" data-log="商品列表">

        <ol class="version">
            @foreach ($goods as $good)
            <li>
                <a class="version-item" href="{{url('good',$good->id)}}">
                    <div class="version-item-img">
                        <img src="{{$good->thumb}}?width=100&amp;height=100">
                    </div>
                    <div class="version-item-intro">
                        <div class="version-item-name"><p>{{$good->name}}</p></div>
                        <div class="version-item-intro-price"><span>{{$good->price}}元</span></div>
                    </div>
                </a>
            </li>
            @endforeach
        </ol>

        @include('layouts.path')

    </div>
</div>


<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
</body>
</html>

