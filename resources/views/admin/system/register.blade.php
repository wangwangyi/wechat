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

                <li class="active">系统管理</li>
                <li>
                    <a href="/admin/system/register">新增管理员</a>
                </li>
            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" action="/admin/do_register" method="post">

                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>

                            <div class="col-sm-9">
                                <input type="email" id="form-field-1" class="col-xs-10 col-sm-5" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" class="col-xs-10 col-sm-5" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Confirm Password</label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" class="col-xs-10 col-sm-5" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

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

                </div><!-- /.col -->
            </div>
        </div><!-- /.page-content -->
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            $("#password").removeClass('active');
            $("#cache").removeClass('active');
            $("#config").removeClass('active');
            $(".regster").addClass('active');
        })
    </script>

@endsection