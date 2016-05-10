@extends('admin.layouts.layout')

@section('css')
    <style>
        .logo {
            width: 60px;
            height: 40px;
        }
    </style>
@endsection

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
                <li class="active">商品管理</li>
                <li class="now">
                    <a href="/admin/brand">商品品牌</a>
                </li>

            </ul><!-- .breadcrumb -->

           {{-- <div class="nav-search" id="nav-search">
                <form class="form-search" action="/admin/search" method="get">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." name="keyword" />
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->--}}
        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->


                    <div class="row">
                        <div class="col-xs-12">



                            @include('admin.layouts._msg')

                            <h3 class="header smaller lighter blue">品牌管理</h3>
                            <p>
                                <a href="{{route('admin.brand.create')}}" class="btn btn-app btn-primary btn-xs">
                                    <i class="icon-envelope bigger-200"></i>
                                    新增
                                </a>


                                <button class="btn btn-app btn-danger btn-xs" id="del_select">
                                    <i class="icon-trash bigger-200"></i>
                                    Delete
                                </button>


                            </p>

                            <div class="table-header">
                               品牌
                            </div>

                            <div class="table-responsive">
                                <form id="form">
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Logo</th>
                                        <th>品牌名</th>
                                        <th class="hidden-480">描述</th>

                                        <th style="width: 8%">
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            排序
                                        </th>
                                        <th class="hidden-480">是否显示</th>

                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace del_id" name="del_id[]"
                                                           value="{{$brand->id}}"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>


                                            <td>
                                                <img src="{{$brand->logo}}" alt="" class="logo">
                                            </td>
                                            <td>
                                                <a href="{{$brand->url}}" target="_blank">
                                                    {{$brand->name}}
                                                </a>
                                            </td>
                                            <td class="hidden-480">{{$brand->desc}}</td>
                                            <td>
                                                <input type="text" data-id="{{$brand->id}}" class="sort_order" style="width:30px;"
                                                       value="{{$brand->sort_order}}">
                                            </td>

                                            <td>
                                                    <label>
                                                        <input class="ace ace-switch ace-switch-5 is_show" data-id="{{$brand->id}}" name="is_show"  type="checkbox"
                                                        @if ($brand->is_show == 0)
                                                            checked
                                                        @endif>
                                                        <span class="lbl"></span>
                                                    </label>

                                            </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                                                    <a class="green" href="{{route('admin.brand.edit', $brand->id)}}">
                                                        <i class="icon-pencil bigger-130"></i>
                                                    </a>

                                                    <a class="red" href="brand/{{$brand->id}}" data-method="delete"
                                                       data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?">
                                                        <i class="icon-trash bigger-130"></i>
                                                    </a>
                                                </div>

                                            {{--    <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip"
                                                                   title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="" class="tooltip-success" data-rel="tooltip"
                                                                   title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip"
                                                                   title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    <div style="margin-left: 800px;">
                                        <ul class="pagination">

                                            <li>
                                             {{--   {!! $brand->links() !!}--}}
                                            </li>


                                        </ul>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    @endsection

    @section('js')
            <!-- page specific plugin scripts -->
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        jQuery(function ($) {

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

        $(function () {
            $(".sort_order").change(function () {
                var info = {
                    id: $(this).data("id"),
                    sort_order: $(this).val()
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/brand/sort_order",
                });
            })




            $("#del_select").click(function () {
                var length = $('.del_id:checked').length;
                if (length == 0) {
                    alert('您必须至少选择一条记录');
                }

                var values = $("#form").serialize();

                $.ajax({
                    type: "DELETE",
                    data: values,
                    url: "/admin/brand/del_select",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });

            })

        })
        $(".is_show").click(function(){

            if($(this).is(':checked') == true){
                is_show =0;
            }else{
                is_show =1;
            }
           /* console.log();*/
            var info = {
                id: $(this).data("id"),
                is_show: is_show
            }
            console.log(info);
            $.ajax({
                type: "PATCH",
                data: info,
                url: "/admin/brand/is_show",
            })

        })



    </script>
@endsection