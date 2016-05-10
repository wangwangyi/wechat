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
                <li>
                    <a href="/admin/category">商品分类</a>
                </li>

            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">

                    <div class="row">
                        <div class="col-xs-12">
                            @include('admin.layouts._msg')

                            <h3 class="header smaller lighter blue">分类管理</h3>
                            <p>
                                <a href="{{route('admin.category.create')}}" class="btn btn-app btn-primary btn-xs">
                                    <i class="icon-envelope bigger-200"></i>
                                    新增
                                </a>
                            </p>

                            <div class="table-header">
                                商品分类
                            </div>

                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>分类名称</th>
                                        <th>商品数量</th>
                                        <th>
                                            是否显示
                                        </th>
                                        <th class="hidden-480">排序</th>

                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td class="parent" id="row_{{$category->id}}">
                                            <a href="#">{{$category->name}}</a>
                                        </td>
                                        <td>$45</td>
                                        <td>
                                            <label>
                                                <input class="ace ace-switch ace-switch-7 is_show" data-id="{{$category->id}}" name="is_show"  type="checkbox"
                                                       @if ($category->is_show == 0)
                                                       checked
                                                        @endif>
                                                <span class="lbl"></span>
                                            </label>

                                        </td>

                                        <td class="hidden-480">
                                            <span class="label label-sm label-warning">Expiring</span>
                                        </td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                <a href="{{route('admin.category.edit', $category->id)}}"><button class="btn btn-xs btn-info">
                                                    <i class="icon-edit bigger-120"></i>
                                                </button></a>

                                                <a href="category/{{$category->id}}" data-method="delete"
                                                   data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?"><button class="btn btn-xs btn-danger">
                                                    <i class="icon-trash bigger-120"></i>
                                                </button></a>


                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-cog icon-only bigger-110"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                                </div>
                                        </td>

                                    </tr>
                                    @foreach ($category['children'] as $cate)
                                        <tr class="child_row_{{$cate->parent_id}}">
                                            <td>
                                                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</a>
                                            </td>
                                            <td>$45</td>
                                            <td>
                                                <label>
                                                    <input class="ace ace-switch ace-switch-7 is_show" data-id="{{$cate->id}}" name="is_show"  type="checkbox"
                                                           @if ($cate->is_show == 0)
                                                           checked
                                                            @endif>
                                                    <span class="lbl"></span>
                                                </label>

                                            </td>

                                            <td class="hidden-480">
                                                <span class="label label-sm label-warning">Expiring</span>
                                            </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    <a href="{{route('admin.category.edit', $cate->id)}}"><button class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </button></a>

                                                    <a href="category/{{$cate->id}}" data-method="delete"
                                                       data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?"><button class="btn btn-xs btn-danger">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </button></a>


                                                    <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                        <div class="inline position-relative">
                                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-cog icon-only bigger-110"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


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

            $('td.parent').click(function(){   // 获取所谓的父行

                $(this).parent('tr').siblings('.child_'+this.id).toggle();  // 隐藏/显示所谓的子行
            }).click();





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
          /*  $(".sort_order").change(function () {
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
            })*/

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
                    url: "/admin/category/is_show",
                })

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





    </script>
@endsection