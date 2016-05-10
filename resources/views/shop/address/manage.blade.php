<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>地址信息</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>


    <link rel="icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/assets/shop/flexslider/flexslider.css">
    <link rel="stylesheet" href="/assets/shop/css/common.css">
    <script src="/assets/shop/js/fontSize.js"></script>

</head>
<body>




<div id="wrapper">
    <div class="page-address-list" data-log="地址列表">
        <div class="address-manage">
            <div class="ui-card">
                @foreach($addresses as $a)
                    <ul class="ui-card-item ui-list">
                        <li class="ui-list-item identity">
                            <a href="/address/{{$a->id}}" data-method="delete">删除</a>
                            <span class="consignee">{{$a->name}}</span>
                            <span>{{$a->tel}}</span>
                        </li>
                        <li class="ui-list-item edit" onclick="location.href='/address/{{$a->id}}/edit'">
                            <p>{{$a->province}} {{$a->city}} {{$a->area}}</p>
                            <p>{{$a->detail}}</p>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>

        <div class="add">
            <a href="/address/create" class="ui-button ui-button-active"><span>新建地址</span></a>
        </div>
        <div class="popup-risk-check"></div>
    </div>
</div>

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>

<script src="/assets/wechat/citySelect.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>

<script>

</script>
</body>
</html>