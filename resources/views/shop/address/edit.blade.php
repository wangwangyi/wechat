<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>地址修改</title>
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
    <div class="page-address-edit" data-log="地址">

        <div class="edit-box">
            <ul class="ui-list">
                <li class="ui-list-item">
                    <div class="label">收货人：</div>
                    <div class="ui-input">
                        <input placeholder="真实姓名" name="name" maxlength="15" type="text" value="{{$address->name}}">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">手机号码：</div>
                    <div class="ui-input">
                        <input placeholder="手机号" name="tel" maxlength="13" type="tel" value="{{$address->tel}}">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">所在地区：</div>
                    <div class="ui-input">
                        <input placeholder="省 市 区" name="pca" id="pca" maxlength="20" type="text"
                               readonly="readonly" value="{{$address->province}} {{$address->city}} {{$address->area}}">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">街道地址：</div>
                    <div class="ui-input">
                        <input placeholder="详细地址" name="detail" maxlength="120" type="text"
                               value="{{$address->detail}}">
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

<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/laravel.js"></script>

<script src="/assets/wechat/citySelect.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script>
    $(function () {
        $('.save-button').click(function () {
            var status = true;

            $("input").each(function () {
                var val = $(this).val();
                if (val == "") {
                    status = false;
                }
            });

            if (status == false) {
                alert('您的填写的地址不完整!')
                return false;
            }

            var data = $("input").serialize();

            $.ajax({
                type: "PUT",
                url: "/address/{{$address->id}}",
                data: data,
                success: function (data) {
                    location.href = "/address/manage";
                }
            })
        })
    })
</script>
</body>
</html>