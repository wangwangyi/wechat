@extends('admin.layouts.layout')
@section('css')

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

                <li class="active">微信管理</li>
                <li>
                    <a href="/admin/api">接口配置</a>
                </li>
            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" action="/admin/api" method="post">

                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">公众号app id <span class="badge badge-danger">app id</span></label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="app_id" value="{{$api['app_id']}}">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">公众号秘钥 <span class="badge badge-info">secret</span> </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="secret" value="{{$api['secret']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">公众号token <span class="badge badge-purple">token</span></label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="token" value="{{$api['token']}}">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">安全传输加密字符串 <span class="badge badge-pink">encoding_key</span></label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="encoding_key" value="{{$api['aes_key']}}">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    保存修改
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>




                    </form>

                </div><!-- /.col -->
            </div>
        </div><!-- /.page-content -->
    </div>
@endsection

@section('js')

@endsection