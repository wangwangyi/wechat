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
                <li class="active">商品管理</li>
                <li>
                    <a href="/admin/type">商品类型</a>
                </li>
                <li class="active">新增</li>
            </ul><!-- .breadcrumb -->

        {{--    <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->--}}
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-5" style="margin-left: 200px;">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4>新建商品类型</h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <form action="{{route('admin.type.store')}}" method="post">
                                            <fieldset>
                                                <label>商品类型名称</label>
                                                <input type="text" placeholder="*必填，不可重复" name="name">
                                            </fieldset>
                                            <div class="form-actions center">
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    提交
                                                    <i class="icon-arrow-right icon-on-right bigger-110"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

        })
    </script>
@endsection