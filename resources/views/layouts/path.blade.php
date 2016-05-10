


    <script type="text/javascript" src="/assets/path/jquery-1.7.2.min.js"></script>

    <script type="text/javascript" src="/assets/path/js.js"></script>

    <script type="text/javascript" src="/assets/path/jquery.transform.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){



            $(".PathItem").hover(function(){

                $(this).find(".metaicondetail").show();

            },function(){

                $(this).find(".metaicondetail").hide();

            });



        });

    </script>


    <link rel="stylesheet" type="text/css" href="/assets/path/index_1.css" media="all">


<div class="PathInner" id="PathMenu" style="margin:0px auto;position: fixed;bottom:0;right: 0;">

    <div class="PathMain">

        <div class="Tmain" onclick="PathRun();">

            <div style="transform: rotate(0deg);" class="rotate" data-transform="rotate(0deg)"><span class="cover"></span></div>

        </div>

    </div>

    <div style="left: 0px; bottom: 0px;" class="PathItem"> <a class="link" href="/" title="首页"> <span class="item" style="background-image: url('/assets/path/moment_icn_address.png'); transform: rotate(0deg);" data-transform="rotate(0deg)"></span> </a>

        <div class="metaicondetail shadow">

            <div style="transform: rotate(0deg);" data-transform="rotate(0deg)" class="inner">
                <p>首页</p>
            </div>

        </div>

    </div>

    <div style="left: 0px; bottom: 0px;" class="PathItem"> <a class="link" href="/category" title="商品分类"> <span class="item" style="background-image: url('/assets/path/moment_icn_info.png'); transform: rotate(0deg);" data-transform="rotate(0deg)"></span> </a>

        <div class="metaicondetail shadow">

            <div style="transform: rotate(0deg);" data-transform="rotate(0deg)" class="inner">
                <p>商品分类</p>
            </div>

        </div>

    </div>

    <div style="left: 0px; bottom: 0px;" class="PathItem"> <a class="link" href="/cart" title="购物车"> <span class="item" style="background-image: url('/assets/path/moment_icn_price.png'); transform: rotate(0deg);" data-transform="rotate(0deg)"></span> </a>

        <div class="metaicondetail shadow">

            <div style="transform: rotate(0deg);" data-transform="rotate(0deg)" class="inner">
                <p>购物车</p>
            </div>

        </div>

    </div>

    <div style="left: 0px; bottom: 0px;" class="PathItem"> <a class="link" href="/user"> <span class="item" style="background-image: url('/assets/path/moment_icn_pic.png'); transform: rotate(0deg);" data-transform="rotate(0deg)"></span> </a>

        <div class="metaicondetail shadow">

            <div style="transform: rotate(0deg);" data-transform="rotate(0deg)" class="inner">
                <p>服务</p>
            </div>
        </div>

    </div>

</div>




