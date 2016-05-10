@extends('admin.layouts.layout')

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
                    <a href="/admin">控制台</a>
                </li>
                <li>
                    <a href="/admin/advertise">广告管理</a>
                </li>
                <li class="active">新增广告</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-8">
                    <!-- PAGE CONTENT BEGINS -->
                    @include('admin.layouts._msg')

                    <div class="widget-box">
                        <div class="widget-header">
                            <h4>新增广告</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <form class="form-horizontal" role="form" action="{{route('admin.advertise.store')}}" method="post">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告名称 </label>

                                            <div class="col-sm-9">
                                                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告位置 </label>

                                            <div class="col-sm-9">
                                                <select class="col-xs-10 col-sm-5" id="form-field-1" name="parent_id">
                                                    <option value="">顶级栏目</option>
                                                    @foreach ($advertises as $advertise)
                                                        <option value="{{$advertise->id}}">{{$advertise->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类 </label>

                                            <div class="col-sm-9">
                                                <select class="col-xs-10 col-sm-5" id="form-field-1" name="category_id">
                                                    <option value="">分类</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                                        @foreach ($category['children'] as $cate)
                                                            <option value="{{$cate->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                                                        @endforeach
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">图片</label>

                                            <div class="col-sm-9">

                                                <img id="img_show" class="editable img-responsive" src="" style="width:160px; height:140px;">

                                                <input type="text" style="display: none;" placeholder="广告图片" class="col-xs-10 col-sm-5" name="thumb" id="img">
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
                                                <textarea class="form-control limited col-xs-10 col-sm-5" id="form-field-9" maxlength="50" name="desc"></textarea>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否显示 </label>

                                            <div class="col-sm-9">
                                                <label>
                                                    <input type="radio" name="is_show" class="ace" checked value="0">
                                                    <span class="lbl">是</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="is_show" class="ace" value="1">
                                                    <span class="lbl">否</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告词 </label>

                                            <div class="col-sm-9">
                                                <label>
                                                    <input type="radio" name="adv" checked value="0">
                                                    <span class="lbl">热卖</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="adv"  value="1">
                                                    <span class="lbl">超值</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="adv"  value="2">
                                                    <span class="lbl">推荐</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="clearfix form-actions">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button class="btn btn-info" type="submit">
                                                    <i class="icon-ok bigger-110"></i>
                                                    增加
                                                </button>

                                                &nbsp; &nbsp; &nbsp;
                                                <a href="/admin/brand"><button class="btn" >
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
    <!-- page specific plugin scripts -->
    <script>
$(function(){

})
    </script>



@endsection

