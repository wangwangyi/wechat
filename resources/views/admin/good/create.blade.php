@extends('admin.layouts.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('webupload/dist/webuploader.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('webupload/style.css') }}" />

    <style>
        .none{
           color:#ccc;

        }
        #profile{
            display:none;
        }

    </style>
@endsection


@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">控制台</a>
                </li>
                <li class="active">商品管理</li>
                <li>
                    <a href="/admin/good/create">新增商品</a>
                </li>

            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')

        <div class="page-content">
            <div class="page-header">
                <h1>
                    添加新商品
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal" role="form" action="{{route('admin.good.store')}}" method="post">

                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab3">
                            <li class="active" id="one">
                                <a data-toggle="tab" href="#home3">
                                    <i class="pink icon-dashboard bigger-110"></i>
                                    通用信息
                                </a>
                            </li>

                            <li class="" id="two">
                                <a data-toggle="tab" href="#profile3">
                                    <i class="blue icon-beaker bigger-110"></i>
                                    商品属性
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content">

                            <div id="home">

                                <div id="index">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品名称</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="请输入商品名称" class="col-xs-10 col-sm-5" name="name">
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品分类</label>
                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="category_id">
                                                <option value=""></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" class="none" disabled="disabled">{{$category->name}}</option>
                                                    @foreach ($category['children'] as $cate)
                                                        <option value="{{$cate->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品品牌</label>
                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="brand_id">
                                                <option value=""></option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品价格</label>
                                        <div class="col-sm-9">
                                            <input type="text"  class="input-mini spinner-input form-control" id="spinner2" maxlength="5" name="price">
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品库存数量</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="input-mini spinner-input form-control" id="spinner3" maxlength="3" name="inventory">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">加入推荐</label>

                                        <div class="col-sm-9">

                                            <div data-toggle="buttons" class="btn-group">
                                                <label class="btn">
                                                    <input type="checkbox" value="0" name="best">
                                                    <i class="icon-only">精品</i>
                                                </label>

                                                <label class="btn">
                                                    <input type="checkbox" value="0" name="new_good">
                                                    <i class="icon-only">新品</i>
                                                </label>

                                                <label class="btn">
                                                    <input type="checkbox" value="0" name="hot">
                                                    <i class="icon-only">热销</i>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上架</label>

                                        <div class="col-sm-9">
                                            <input name="onsale" type="checkbox" class="ace" value="0" checked>
                                            <span class="lbl">选中表示允许销售，否则不允许销售。 </span>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品缩略图 </label>

                                        <div class="col-sm-9">

                                            <img id="img_show" class="editable img-responsive" src="" style="width:160px; height:140px;">

                                            <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="thumb" id="img">
                                            <input type="file" style="display: none;" id="thumb">

                                            <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                                <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right">栏目描述</label>
                                        <div class="col-sm-9">
                                            <textarea  rows="16"  class="col-xs-10 col-sm-5" id="editor_id" maxlength="100" name="desc"></textarea>
                                        </div>
                                    </div>
                                    </div>


                                <div id="uploader">
                                    <div class="queueList">
                                        <div id="dndArea" class="placeholder">
                                            <div id="filePicker"></div>
                                            <p>或将照片拖到这里，单次最多可选300张</p>
                                        </div>
                                    </div>
                                    <div class="statusBar" style="display:none;">
                                        <div class="progress">
                                            <span class="text">0%</span>
                                            <span class="percentage"></span>
                                        </div><div class="info"></div>
                                        <div class="btns">
                                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                        </div>
                                    </div>

                                    <div id="imgs"></div>
                                </div>



                                <div id="profile">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品属性</label>
                                            <div class="col-sm-9">
                                                <select class="col-xs-10 col-sm-5" id="form-field-1">
                                                    <option value="">&nbsp;</option>
                                                    <option value="AL">&nbsp;Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">&nbsp;11</option>
                                                    <option value="CO">Colorado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                    </div>

                            </div>



                        </div>

                    </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    添加
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    返回
                                </button>
                            </div>
                        </div>

                    </form>
                </div><!-- /span -->


            </div>

        </div><!-- /.page-content -->
    </div>

@endsection

@section('js')


    <script src="/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/assets/js/fuelux/fuelux.spinner.min.js"></script>
    <script src="/assets/select2/js/select2.min.js"></script>
    <script src="/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="/assets/js/jquery.maskedinput.min.js"></script>
    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script src="/assets/xshop/upload.js"></script>
    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" src="{{asset('webupload/dist/webuploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('webupload/upload.js')}}"></script>

    <script>


        $(function(){
            $("#two").click(function(){
                $("#profile").show();
                $("#index").hide();
                $("#dropdown").hide();
            });
            $("#one").click(function(){
                $("#profile").hide();
                $("#dropdown").show();
                $("#index").show();
            });

            // 添加全局站点信息
            $(".create").addClass('active');
            $(".trash").removeClass('active');
            $(".goods").removeClass('active');
            $('#spinner2').ace_spinner({min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
            $('#spinner3').ace_spinner({min:0,max:1000,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});


        })

        KindEditor.ready(function (K) {
            window.editor = K.create('#editor_id');
        });

    </script>
@endsection