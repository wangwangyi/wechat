<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>地址</title>
    <meta name="author" content="m.jd.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="/assets/address/index.css" charset="gbk"/>

</head>


<div class="common-wrapper">

    <form action="" method="post">

        <div class="address" >

            @foreach ($addresses as $address)
            <div class="item-addr bdb-1px " >

                <div class="ia-l">
                </div>

                <div class="ia-m m ia-m78 li" onclick="" data-id="{{$address->id}}">
                    <div class="mt_new">
                        <span>{{$address->name}}</span>
                        <strong>{{$address->tel}}</strong>
                    </div>
                    <div class="mc">
                        <p>
                           {{-- <i class="sitem-tip">默认</i>--}}
                            {{$address->province}}{{$address->city}}{{$address->area}}{{$address->detail}}
                        </p>
                    </div>
                </div>
                <div class="addr-btn" style="height:50px;float:left;width:50px;" onclick="location.href='/address/{{$address->id}}/edit'">

                                        <a href="javascript:void(0)" name="selSpan" id="selSpan137864612" class="btn-chk on" style="width:100%;line-height: 50px;"><span></span>修改</a>

                </div>
            </div>
                @endforeach

        </div>


        <div class="pay-btn" style="background: rgb(248, 248, 248) none repeat scroll 0% 0%;">
            <a href="/address/create" class="btn1 tip-btn"><i class="plus">+</i>新建地址</a>
        </div>







    </form>
</div>
<script src="/assets/shop/js/jquery.min.js"></script>
<script src="/assets/shop/js/fastclick.js"></script>
<script src="/assets/shop/js/common.js"></script>
<script>
    $(function () {

        $(".li").click(function () {
            var address_id = $(this).data("id");
            $.ajax({
                type: "PATCH",
                url: "",
                data: {address_id: address_id},
                success: function (data) {
//                        console.log(data);
                    location.href = '/order/checkout';
                }
            })
        })
    })
</script>


</body>
</html>
