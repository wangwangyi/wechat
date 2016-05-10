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
                    <a href="/admin/api/menu_edit">自定义菜单</a>
                </li>
            </ul><!-- .breadcrumb -->

        </div>


        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="page-header">
                        <h1>
                            自定义菜单
                        </h1>
                    </div>

                    @include('admin.layouts._msg')


                    <form action="/admin/api/menu" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab0">
                                                <i class="green icon-home bigger-110"></i>
                                                菜单一
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#tab1">
                                                菜单二
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab"  href="#tab2">
                                                菜单三
                                            </a>

                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                    @for ($i = 0; $i < 3; $i++)
                                        <?php
                                        $button = isset($buttons["$i"]) ? $buttons["$i"] : "";
                                            ?>

                                            @include('admin.api._menu', ['button' => $button, 'index'=>$i])


                                    @endfor
                                    </div>
                                </div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-info" type="submit">
                                            <i class="icon-ok bigger-110"></i>
                                            保存修改
                                        </button>

                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn" type="submit">
                                            <i class="icon-undo bigger-110"></i>
                                            重置
                                        </button>
                                    </div>
                                </div>
                            </div><!-- /span -->

                            <div class="vspace-xs-6"></div>


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
        $(".wei").addClass('active');
        $(".xin").removeClass('active');


    })
</script>
@endsection