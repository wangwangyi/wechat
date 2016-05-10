<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <script src="/assets/shop/js/fontSize.js"></script>
    <title>商品分类</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

   {{-- <link rel="stylesheet" type="text/css" href="/assets/shop/assets/css/cate.css" media="all">--}}
    <link rel="stylesheet" href="/assets/shop/css/common.css">
</head>
<body class="mlist hide-landing">




<div id="wrapper">
    <div class="page-category" data-log="商品分类">

        <div class="page-category-wrap"  style="">
            @foreach($categories as $category)
            <div class="list-wrap" id="m0">
                <h3 class="list_title">{{$category->name}}</h3>

                <ol class="list_category">
                    @foreach ($category['children'] as $cate)
                    <li>
                        <a href="{{url('good_list',$cate->id)}}">
                            <div class="img">
                                <img src="{{$cate->thumb}}">
                            </div>
                        </a>
                        <div class="name"><span>{{$cate->name}}</span></div>
                    </li>
                    @endforeach
                </ol>

            </div>
                @endforeach
        </div>
        @include('layouts.path')
    </div>
</div>



<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script>
    $(function () {

    });
</script>


</body>
</html>
