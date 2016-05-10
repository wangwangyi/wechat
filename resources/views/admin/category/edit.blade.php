@extends('admin.layouts.layout')

@section('css')
    <link rel="stylesheet" href="/assets/select2/css/select2.min.css">
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
                    <a href="/admin">控制台</a>
                </li>

                <li>
                    <a href="/admin/category">商品分类</a>
                </li>
                <li class="active">新增商品</li>

            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="page-header">
                <h1>
                    新增分类

                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" action="{{route('admin.category.update',$category->id)}}" method="post">
                        {!! method_field('put') !!}
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">分类名称</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="*必填，不可重复" name="name" value="{{$category->name}}" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上级分类</label>
                            <div class="col-sm-9">
                                <select class="col-xs-10 col-sm-5"   data-placeholder="顶级栏目"  id="select" name="parent_id">
                                    <option value=""
                                            @if($category->parent_id ==0)
                                    selected
                                            @endif
                                    >顶级栏目</option>
                                    @foreach ($categories as $cate)
                                        <option value="{{$cate->id}}"
                                        @if($cate->id == $category->parent_id)
                                            selected
                                        @endif
                                        >{{$cate->name}}</option>

                                        @foreach ($category['children'] as $c)
                                            <option value="{{$c->id}}"
                                                    @if($c->id == $category->parent_id)
                                                    selected
                                                    @endif
                                            >{{$c->name}}</option>
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">分类代表图片</label>

                            <div class="col-sm-9">

                                <img id="img_show" class="editable img-responsive" src="{{$category->thumb}}" style="width:160px; height:140px;">

                                <input type="text" style="display: none;" placeholder="品牌Logo" value="{{$category->thumb}}" class="col-xs-10 col-sm-5" name="thumb" id="img">
                                <input type="file" style="display: none;" id="thumb">

                                <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                    <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                </button>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group file">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5"></label>

                            <div class="col-sm-3">
                                <select class="form-control type">
                                    <option value="-1">请选择商品类型</option>
                                    @foreach($types as $k=>$type )
                                        <option value="{{ $k }}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}" class="form-control attributes" name="filter_attr[]">

                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-danger btn-sm del" type="button">删除</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5">排序</label>

                            <div class="col-sm-9">
                                <div class="clearfix">
                                    <input class="col-xs-1" type="text" id="form-field-5"  />
                                </div>

                                <div class="space-2"></div>

                                <div class="help-block" id="input-span-slider"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">是否显示</label>
                            <div class="col-sm-9">
                                <label>
                                    <input type="radio" name="is_show" class="ace" value="0"
                                           @if($category->is_show == 0)
                                    checked
                                            @endif>
                                    <span class="lbl">是</span>
                                </label>
                                <label>
                                    <input type="radio" name="is_show" class="ace" value="1"
                                           @if($category->is_show == 1)
                                           checked
                                            @endif>
                                    <span class="lbl">否</span>
                                </label>
                            </div>
                        </div>

                        <div class="space-4"></div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">栏目描述</label>
                            <div class="col-sm-9">
                                <textarea id="form-field-1"  class="col-xs-10 col-sm-5" rows="6"  maxlength="100" name="desc"></textarea>
                            </div>
                        </div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    新增
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <a href="/admin/brand"> <button class="btn" type="submit">
                                        <i class="icon-undo bigger-110"></i>
                                        返回
                                    </button></a>
                            </div>
                        </div>




                    </form>



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->


@endsection




@section('js')
    <script src="/assets/select2/js/select2.min.js"></script>
    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script src="/assets/xshop/upload.js"></script>

    <!-- inline scripts related to this page -->

    <script type="text/javascript">
        jQuery(function($) {

            $('#select').select2();//下拉搜索


        });
    </script>
@endsection