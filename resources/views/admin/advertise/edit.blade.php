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
            <li class="active"><a href="#">广告管理</a></li>
            <li class="active">编辑广告</li>
        </ul><!-- .breadcrumb -->

    </div>

    <div class="page-content">

        <div class="row">
            <div class="col-xs-8">
                <!-- PAGE CONTENT BEGINS -->

                <div class="widget-box">
                    <div class="widget-header">
                        <h4>广告修改</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <form class="form-horizontal" role="form" action="{{route('admin.advertise.update',$advertise->id)}}" method="post">
                                    {!! method_field('put') !!}
                                    <input type="hidden" name="id" value="{{$advertise->id}}">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告名称 </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name" value="{{$advertise->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告位置 </label>

                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="parent_id">
                                                <option value="">顶级</option>
                                                @foreach ($advertises as $adv)
                                                    <option value="{{$adv->id}}"
                                                    @if($adv->id == $advertise->parent_id)
                                                    selected
                                                            @endif
                                                    >{{$adv->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类 </label>

                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-5" id="form-field-1" name="category_id">
                                                <option value=""
                                                        @if($advertise->parent_id ==0)
                                                selected
                                                        @endif>分类</option>
                                                @foreach ($categories as $category)
                                                    <option disabled="disabled" value="{{$category->id}}
                                                            ">{{$category->name}}</option>
                                                    @foreach ($category['children'] as $cate)
                                                        <option value="{{$cate->id}}"  @if($cate->id == $advertise->category_id) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片 </label>

                                        <div class="col-sm-9">

                                            <img id="img_show" class="editable img-responsive" src="{{$advertise->thumb}}" style="width:160px; height:140px;">

                                            <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="thumb" value="{{$advertise->thumb}}" id="img">
                                            <input type="file" style="display: none;" id="thumb">

                                            <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                                <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告描述 </label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control limited col-xs-10 col-sm-5" id="form-field-9" maxlength="50" name="desc">{{$advertise->desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否显示 </label>

                                        <div class="col-sm-9">
                                            <label>
                                                <input class="ace ace-switch ace-switch-5 show" data-id="{{$advertise->id}}" type="checkbox" name="is_show" value="{{$advertise->is_show}}"
                                                       @if ($advertise->is_show ==0)
                                                checked
                                                @endif>
                                                <span class="lbl"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>


                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="submit">
                                                <i class="icon-ok bigger-110"></i>
                                                提交修改
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <a href="/admin/advertise"> <button class="btn">
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
                url: "/admin/advertise/is_show",
            })

        })

    })
</script>

@endsection