@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">控制台</a>
                </li>
                <li class="active">商品管理</li>
                <li class="active">商品品牌</li>
            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-8">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="widget-box">
                        <div class="widget-header">
                            <h4>品牌信息修改</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <form class="form-horizontal" role="form" action="{{route('admin.brand.update',$brand->id)}}" method="post">
                                        {!! method_field('put') !!}
                                        <input type="hidden" name="id" value="{{$brand->id}}">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 品牌名称 </label>

                                            <div class="col-sm-9">
                                                <input type="text" id="form-field-1" placeholder="品牌名称" value="{{$brand->name}}" class="col-xs-10 col-sm-5" name="name">
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 品牌网址 </label>

                                            <div class="col-sm-9">
                                                <input type="text" id="form-field-1" placeholder="品牌网址" value="{{$brand->url}}" class="col-xs-10 col-sm-5" name="url">
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 品牌Logo </label>

                                            <div class="col-sm-9">

                                                <img id="img_show" class="editable img-responsive" src="{{$brand->logo}}" style="width:160px; height:140px;">

                                                <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="logo" value="{{$brand->logo}}" id="img">
                                                <input type="file" style="display: none;" id="thumb">

                                                <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                                    <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 品牌描述 </label>

                                            <div class="col-sm-9">
                                                <textarea class="form-control limited col-xs-10 col-sm-5" id="form-field-9" maxlength="50" name="desc">{{$brand->desc}}</textarea>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否显示 </label>

                                            <div class="col-sm-9">
                                                <label>
                                                    <input class="ace ace-switch ace-switch-5 show" data-id="{{$brand->id}}" type="checkbox" name="is_show" value="{{$brand->is_show}}"
                                                           @if ($brand->is_show == 0)
                                                    checked
                                                            @endif>
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 排序 </label>

                                            <div class="col-sm-9">
                                                <input type="text" id="form-field-1" placeholder="排序" class="col-xs-10 col-sm-5" value="{{$brand->sort_order}}" name="sort_order">
                                            </div>
                                        </div>


                                        <div class="clearfix form-actions">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button class="btn btn-info" type="submit">
                                                    <i class="icon-ok bigger-110"></i>
                                                    提交修改
                                                </button>

                                                &nbsp; &nbsp; &nbsp;
                                                <a href="/admin/brand"> <button class="btn">
                                                    <i class="icon-undo bigger-110"></i>
                                                    返回
                                                </button></a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
</div>
        </div>
        @endsection

        @section('js')
            <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
            <script src="/assets/xshop/upload.js"></script>
                <script>
                    $(function(){


                        $('.show').click(function(){
                            var a= $(this).is(':checked');
                            if(a == true){
                                is_show =0;
                                $(this).val(is_show);
                            }else{
                                is_show =1;
                                $(this).val(is_show);
                            }
                            var info = {
                                id: $(this).data("id"),
                                is_show: is_show
                            }
                            console.log(info);
                            $.ajax({
                                type: "PATCH",
                                data: info,
                                url: "/admin/brand/is_show",
                            })

                        })

                    })
                </script>

@endsection