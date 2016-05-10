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
                    <a href="/admin/system/cache">清除缓存</a>
                </li>
            </ul><!-- .breadcrumb -->


        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="widget-box transparent invoice-box">


                                <h1 class="bigger lighter">
                                    <a href="/admin/system/clear_cache">
                                    <button class="btn btn-info btn-block">
                                        <i class="icon-spinner icon-spin orange bigger-125"></i>清除缓存
                                    </button></a>

                                </h1>
                            </div>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
@endsection

@section('js')

    <script>
        $(function(){
            $("#password").removeClass('active');
            $("#edit").removeClass('active');
        })
    </script>
@endsection