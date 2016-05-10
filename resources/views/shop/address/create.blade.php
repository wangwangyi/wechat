<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新增地址</title>
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
<div id="globalLoading" class="global-loading">
    <div class="global-loading-logo">
        <div id="globalLoadingAnim" class="global-loading-anim"></div>
    </div>

</div>



<div id="wrapper">
    <div class="page-address-edit" data-log="地址">
        <div class="edit-box">
            <ul class="ui-list">
                <li class="ui-list-item">
                    <div class="label">收货人：</div>
                    <div class="ui-input"><input placeholder="真实姓名" name="name" maxlength="15" type="text">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">手机号码：</div>
                    <div class="ui-input"><input placeholder="手机号" name="tel" maxlength="13" type="tel"></div>
                </li>
                <li class="ui-list-item">
                    <div class="label">所在地区：</div>
                    <div class="ui-input">
                        <input placeholder="省 市 区" name="pca" id="pca" maxlength="20" type="text"
                               readonly="readonly" value="">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">街道地址：</div>
                    <div class="ui-input"><input placeholder="详细地址" name="detail" maxlength="120" type="text">
                    </div>
                </li>
            </ul>
            <div class="save-button">
                <a href="javascript:;" class="ui-button"><span>保存地址</span></a>
            </div>

        </div>



        <div class="ui-mask" style="display:none;"></div>
        <div class="ui-pop" style="display:none;">
            <div class="ui-pop-content">
                <div class="region-list" id="city">

                </div>
            </div>
            <div class="ui-pop-title">选择所在地区</div>
            <div class="ui-pop-close"><a><span class="icon-10chahaokuang"></span></a></div>
        </div>

        <div class="popup-risk-check"></div>
    </div>
</div>
{{--<div class="bottom-submit ui-box">
    <div class="price">
        <span id="num">共0件 金额：</span><br>
        <strong id="total_price">0</strong><span>元</span>
    </div>
    <div class="btn">
        <a class="ui-button ui-button-disable" href="/category"><span>继续购物</span></a>
    </div>
    <div class="btn">
        <a class="ui-button" href="/order/checkout"><span>去结算</span></a>
    </div>
</div>--}}
<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>

<script src="/assets/wechat/citySelect.js"></script>
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