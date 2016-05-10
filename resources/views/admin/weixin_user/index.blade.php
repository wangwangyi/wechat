@extends('admin.layouts.layout')
@section('css')
    <style>
        .logo{
            width:60px;
            height:60px;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td
        {
            border: 0px solid #ddd;
        }
        .trim{
            line-height: 76px;;
        }
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
                    <a href="/admin">控制台</a>
                </li>
                <li class="active">会员管理</li>

            </ul><!-- .breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    会员管理
                </h1>

            </div><!-- /.page-header -->


            <table>
                <tr>
                    <td>
                        <div class="widget-main">
                            <form  method="get">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control search-query" placeholder="请输入关键字" value="{{Request::input('keyword')}}" name="keyword">
																	<span class="input-group-btn">
																		<button type="submit" class="btn btn-purple btn-sm">
                                                                            Search
                                                                            <i class="icon-search icon-on-right bigger-110"></i>
                                                                        </button>
																	</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>

                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>图像</th>
                                            <th>昵称</th>
                                            <th>性别</th>
                                            <th>关注时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="trim">
                                                        {{$user->id}}
                                                    </div>
                                                </td>
                                                <td class="hidden-480"> <img class="logo" src="{{$user->headimgurl}}" alt=""></td>
                                                <td>
                                                    <div class="trim">
                                                       {{$user->nickname}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="trim">
                                                      @if($user->sex == 1) 男
                                                          @elseif($user->sex == 2)
                                                        女
                                                          @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="trim">
                                                        {{date('Y年m月d日 H:s',strtotime($user->created_at))}}
                                                    </div>
                                                </td>

                                                <td>

                                                    <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <div class="trim">
                                                            <a href="/admin/order?weixin_user_id={{ $user->id }}">
                                                                <button class="btn btn-xs btn-info">
                                                                    查看订单
                                                                </button>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="margin-left: 800px;">
                                        <ul class="pagination">
                                            <li>
                                                {{--  {!! $goods->links() !!}--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /.table-responsive -->
                            </div><!-- /span -->
                        </div><!-- /row -->


                    </div><!-- /.col -->
                </div><!-- /.row -->

            <div style="margin-left: 800px;">
                <ul class="pagination">
                    <li>
                        {!! $users->links() !!}
                    </li>
                </ul>
            </div>
        </div><!-- /.page-content -->
    </div>

@endsection

@section('js')

    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        jQuery(function ($) {
            $(".goods").removeClass('active');

            var oTable1 = $('#sample-table-2').dataTable({
                "aoColumns": [
                    {"bSortable": false},
                    null, null, null, null, null,
                    {"bSortable": false}
                ]
            });


            $('table th input:checkbox').on('click', function () {
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function () {
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });

            });


            $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('table')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                var w2 = $source.width();

                if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                return 'left';
            }
        })



    </script>



@endsection