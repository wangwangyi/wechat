@extends('admin.layouts.layout')
@section('css')
    <style>


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
                <li class="active">内容管理</li>
                <li>
                    <a href="/admin/article/create">新增文章</a>
                </li>

            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')

        <div class="page-content">
            <div class="page-header">
                <h1>
                    添加新文章
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal" role="form" action="{{route('admin.article.update')}}" method="post">

                        <div id="index">

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 所属栏目 </label>

                                <div class="col-sm-9">
                                    <select class="col-xs-10 col-sm-5" id="form-field-1" name="category_id">
                                        <option value="">顶级栏目</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">文章标题</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="文章标题" class="col-xs-10 col-sm-5" name="title" value="{{$article->title}}">
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">缩略图</label>

                                <div class="col-sm-9">

                                    <img id="img_show" class="editable img-responsive" src="" style="width:160px; height:140px;">

                                    <input type="text" style="display: none;" class="col-xs-10 col-sm-5" name="thumb" id="img">
                                    <input type="file" style="display: none;" id="thumb">

                                    <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                        <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">是否置顶</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="is_top" value="0" />是
                                    <input type="radio" name="is_top" value="1" checked/>否
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">文章摘要</label>
                                <div class="col-sm-9">
                                    <textarea  rows="5"  class="col-xs-10 col-sm-5" maxlength="100" name="abstract"></textarea>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">文章内容</label>
                                <div class="col-sm-9">
                                    <textarea  rows="16"  class="col-xs-10 col-sm-5" id="editor_id" maxlength="100" name="content"></textarea>
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
                                    重置
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
    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script src="/assets/xshop/upload.js"></script>
    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>

    <script>


        KindEditor.ready(function (K) {
            window.editor = K.create('#editor_id');
        });

    </script>
@endsection