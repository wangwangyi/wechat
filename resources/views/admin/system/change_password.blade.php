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
                <li class="active">修改密码</li>
            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" action="/admin/system/change_password" method="post">
                        {!! method_field('patch') !!}
                        <input type="hidden" name="id" value="{{$admin->id}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 原始密码 </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" placeholder="*请输入原始密码" class="col-xs-10 col-sm-5" name="old_password">
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码 </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" placeholder="*请输入新密码" class="col-xs-10 col-sm-5" name="password">
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码 </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" placeholder="*请再次输入新密码" class="col-xs-10 col-sm-5" name="password_confirmation">
                            </div>
                        </div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
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

    <script>
        $(function(){
            $("#cache").removeClass('active');
            $("#edit").removeClass('active');
            $("#config").removeClass('active');
        })
    </script>
@endsection