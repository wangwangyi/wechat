@extends('admin.layouts.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('webupload/dist/webuploader.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('webupload/style.css') }}" />
    <style>
        .edit{
            float:left;
            postion:absolute;
        }
        #show{
            width:150px;height:150px;
            margin-bottom: 10px;;
        }

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
                    <form class="form-horizontal" role="form" action="{{route('admin.good.update',$good->id)}}" method="post">
                      {!! method_field('put') !!}
                        <input type="hidden" name="id" value="{{$good->id}}">
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

                                <div id="index" >

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品名称</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" value="{{$good->name}}" placeholder="请输入商品名称" class="col-xs-10 col-sm-5" name="name">
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品分类</label>
                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option disabled="disabled" class="none"  value="{{$category->id}}"
                                                    >{{$category->name}}</option>
                                                    @foreach ($category['children'] as $cate)
                                                        <option value="{{$cate->id}}"
                                                                @if($good->category_id == $cate->id)
                                                                selected
                                                                @endif
                                                        >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品品牌</label>
                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}"
                                                            @if($good->brand_id == $category->id)
                                                            selected
                                                            @endif
                                                    >{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品价格</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$good->price}}"  class="input-mini spinner-input form-control"  maxlength="5" name="price">
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品库存数量</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$good->inventory}}" class="input-mini spinner-input form-control"  maxlength="3" name="inventory">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">加入推荐</label>

                                        <div class="col-sm-9">

                                            <div data-toggle="buttons" class="btn-group">
                                                <label class="btn check
                                                 @if($good->best == 0)
                                                        active
                                                    @endif
                                                        ">

                                                    <i class="icon-only">精品</i>
                                                </label>
                                                <input type="hidden" value="{{$good->best}}" name="best">

                                                <label class="btn check
                                                 @if($good->new_good == 0)
                                                        active
                                                    @endif
                                                ">

                                                    <i class="icon-only">新品</i>
                                                </label>
                                                <input type="hidden"  value="{{$good->new_good}}" name="new_good">

                                                <label class="btn check
                                                 @if($good->hot == 0)
                                                        active
                                                    @endif
                                                ">

                                                    <i class="icon-only">热销</i>
                                                </label>
                                                <input type="hidden" value="{{$good->hot}}" name="hot">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上架</label>

                                        <div class="col-sm-9">
                                            <input type="checkbox" class="ace onsale" name="onsale" value="{{$good->onsale}}" data-id="{{$good->id}}"
                                                   @if($good->onsale == 0)
                                                       checked
                                                   @endif
                                            >
                                            <span class="lbl">选中表示允许销售，否则不允许销售。 </span>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品缩略图 </label>

                                        <div class="col-sm-9">

                                            <img id="img_show" class="editable img-responsive" src="{{$good->thumb}}" style="width:160px; height:140px;">

                                            <input type="text" style="display: none;" value="{{$good->thumb}}" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="thumb" id="img">
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
                                            <textarea  rows="16"  class="col-xs-10 col-sm-5" id="editor_id" maxlength="100" name="desc">{{$good->desc}}</textarea>
                                        </div>
                                    </div>



                                </div>

                                <div id="profile" >

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

                                <div id="dropdown" >
                                    <ul class="am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-margin gallery-list">
                                        @foreach($good->good_galleries as $gallery)
                                            <li class="edit" style="position:relative;">
                                                <a href="#" class="cboxElement">
                                                    <img class="am-img-thumbnail am-img-bdrs image" data-id="{{$gallery->id}}" id="show" src="{{$gallery->imgs}}" alt="" />
                                                </a>

                                                <button type="button" class="btn btn-xs btn-danger delete" style="position:absolute;left:26%;top:93%;">
                                                    <i class="icon-bolt bigger-110"></i>
                                                    删除
                                                    <i class="icon-trash icon-on-right"></i>
                                                </button>
                                            </li>

                                        @endforeach
                                            <div style="clear:both;"></div>
                                    </ul>
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
                                </div>

                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    修改
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

           $(".delete").click(function(){
               var id = $(".image").attr("data-id");
               var _this = $(this);
                $.ajax({
                    type: "DELETE",
                    data: {id:id},
                    url: "/admin/good/del",
                    success: function (data) {
                        console.log(data);
                        _this.parents("li").remove();
                    }
                });
            })



            $('.onsale').click(function(){
                var a= $(this).is(':checked');
                if(a == true){
                    onsale =0;
                    $(this).val(onsale);
                }else{
                    onsale =1;
                    $(this).val(onsale);
                }
                var info = {
                    id: $(this).data("id"),
                    onsale: onsale
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/good/onsale",
                })

            })

            $(".check").click(function(){
                //alert($(this).next().val());
                if($(this).next("input").val() == 1){
                    $(this).next("input").val("0");
                }else{
                    $(this).next("input").val("1");

                }
                console.log($(this).val());
            });

            $('#spinner2').ace_spinner({min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
            $('#spinner3').ace_spinner({min:0,max:1000,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
            $('#id-input-file-3').ace_file_input({
                style:'well',
                btn_choose:'选择要上传的缩略图',
                btn_change:null,
                no_icon:'icon-cloud-upload',
                droppable:true,
                thumbnail:'small'
                ,
                preview_error : function(error_code) {
                }
            }).on('change', function(){

            });

        })

        KindEditor.ready(function (K) {
            window.editor = K.create('#editor_id');
        });

    </script>
@endsection