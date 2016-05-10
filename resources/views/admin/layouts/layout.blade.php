<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Mi_shop后台管理</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- basic styles -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->
    @yield('css')

    <!-- fonts -->

    {{--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />--}}

    <!-- ace styles -->

    <link rel="stylesheet" href="/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/assets/css/ace-skins.min.css" />


    <link rel="stylesheet" href="/assets/css/ace-ie.min.css" />

    <script src="/assets/js/ace-extra.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">


<style>

</style>


</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                   Mi_shop后台管理系统
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            8条通知
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												新闻评论
											</span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="btn btn-xs btn-primary icon-user"></i>
                                切换为编辑登录..
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												新订单
											</span>
                                    <span class="pull-right badge badge-success">+8</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												粉丝
											</span>
                                    <span class="pull-right badge badge-info">+11</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                查看所有通知
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-envelope-alt"></i>
                            5条消息
                        </li>

                        <li>
                            <a href="#">
                                <img src="/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												不知道写啥 ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>1分钟以前</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												不知道翻译...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20分钟以前</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												到底是不是英文 ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>下午3:15</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="inbox.html">
                                查看所有消息
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
                                    {{$admin->name}}
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li class="divider"></li>

                        <li>
                            <a href="/logout">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="icon-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="icon-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="icon-group"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="{{ $_index or '' }}">
                    <a href="/admin">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>


                <li class="{{ $_good or '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 商品管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu" style="display:{{ $_a or '' }};">
                        <li class="{{ $_brand or '' }}">
                            <a href="/admin/brand">
                                <i class="icon-double-angle-right"></i>
                                商品品牌
                            </a>
                        </li>

                        <li class="{{ $_cate or '' }}">
                            <a href="/admin/category">
                                <i class="icon-double-angle-right"></i>
                                商品分类
                            </a>
                        </li>

                        <li  class="{{ $_goods or '' }} goods">
                            <a href="/admin/good">
                                <i class="icon-double-angle-right"></i>
                                商品列表
                            </a>
                        </li>

                        <li class="{{ $_create or '' }} create">
                            <a href="/admin/good/create">
                                <i class="icon-double-angle-right"></i>
                               添加新商品
                            </a>
                        </li>

                        <li class="{{ $_type or '' }}">
                            <a href="/admin/type">
                                <i class="icon-double-angle-right"></i>
                                商品类型
                            </a>
                        </li>

                        <li class="{{ $_trash or '' }} trash">
                            <a href="/admin/good/trash">
                                <i class="icon-double-angle-right"> </i>
                                商品回收站
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="{{ $_api or '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class=" icon-comments"></i>
                        <span class="menu-text">微信管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu" style="display:{{ $_i or '' }};">
                        <li class="wei">
                            <a href="/admin/api/menu_edit">
                                <i class="icon-double-angle-right"></i>
                                自定义菜单
                            </a>
                        </li>

                        <li class="{{ $_api_edit or '' }} xin">
                            <a href="/admin/api">
                                <i class="icon-double-angle-right"></i>
                                接口配置
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ $_article or '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class=" icon-book"></i>
                        <span class="menu-text">内容管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu" style="display:{{ $_art or '' }};">
                        <li class="{{ $_articles or '' }}">
                            <a href="/admin/article">
                                <i class="icon-double-angle-right"></i>
                                文章列表
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{$_order or ''}}">
                    <a href="/admin/order" class="dropdown-toggle">
                        <i class="icon-edit"></i>
                        <span class="menu-text"> 订单管理 </span>
                    </a>

                </li>

                <li class="{{$_weixin or ''}}">
                    <a href="/admin/weixin_user">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 会员管理 </span>
                    </a>
                </li>


                <li class="{{$_express or ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cog"></i>
                        <span class="menu-text">系统设置</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu" style="display:{{$_b or ''}}">
                        <li class="{{$_edit or ''}}" id="config">
                            <a href="/admin/system/edit_config">
                                <i class="icon-double-angle-right"></i>
                                站点信息
                            </a>
                        </li>

                        <li class="{{$_e or ''}}">
                            <a href="/admin/express">
                                <i class="icon-double-angle-right"></i>
                                物流运费
                            </a>
                        </li>
                        <li class="{{$_password or ''}}" id="password">
                            <a href="/admin/system/change_password">
                                <i class="icon-double-angle-right"></i>
                                修改账号密码
                            </a>
                        </li>
                        <li class="regster">
                            <a href="/admin/system/register">
                                <i class="icon-double-angle-right"></i>
                                新增管理员账号
                            </a>
                        </li>
                        <li class="{{$_cache or ''}}" id="cache">
                            <a href="/admin/system/cache">
                                <i class="icon-double-angle-right"></i>
                                清除缓存
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{$_adv or ''}}">
                    <a href="/admin/advertise" class="dropdown-toggle">
                        <i class="icon-file-alt"></i>
								<span class="menu-text">
									广告
								</span>

                    </a>

                </li>
            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        @yield('content')
        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="icon-cog bigger-150"></i>
            </div>

            <div class="ace-settings-box" id="ace-settings-box">
                <div>
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="default" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; 选择皮肤</span>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                    <label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                    <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                    <label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                    <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                    <label class="lbl" for="ace-settings-add-container">
                        切换窄屏
                        <b></b>
                    </label>
                </div>
            </div>
        </div><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<![endif]-->

<script src="/assets/js/html5shiv.js"></script>
<script src="/assets/js/respond.min.js"></script>
<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="/assets/js/excanvas.min.js"></script>
<![endif]-->


<!-- ace scripts -->

<script src="/assets/js/ace-elements.min.js"></script>
<script src="/assets/js/ace.min.js"></script>

<script src="/assets/xshop/laravel.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   /* $(function() {
        var li = $(".breadcrumb li:last-child").text();
        var nav = $(".nav-list li .submenu li").text();
        $(".nav-list li .submenu li").click(function () {

            if (li == this.text()) {

            }

        })
    })*/
</script>
@yield('js')

</body>
</html>

