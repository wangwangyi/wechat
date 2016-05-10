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
                <li class="active">商品管理</li>
                <li>
                    <a href="/admin/good/del_good">商品回收站</a>
                </li>

            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    商品回收站
                </h1>

            </div><!-- /.page-header -->
            <p>
                <button id="restore" type="button" class="btn btn-success" data-loading-text="Loading...">批量还原</button>
                <button type="button" id="delete" class="btn btn-primary" data-toggle="button">批量删除</button>

            </p>

            @include('admin.layouts._msg')

            <form action="" id="form">
            <div class="row">
                <div class="col-xs-12">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>编号</th>
                                        <th>商品缩略图</th>
                                        <th>商品名称</th>

                                        <th>分类</th>
                                        <th>价格</th>

                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                            @foreach ($goods as $good)
                                        <tr>
                                            <td class="center">
                                                <div class="trim">
                                                    <label>
                                                        <input type="checkbox" class="ace select_id" name="select_id[]"
                                                               value="{{$good->id}}"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="trim">
                                                    {{$good->id}}
                                                </div>
                                            </td>
                                            <td class="hidden-480"> <img class="logo" src="{{$good->thumb}}" alt=""></td>
                                            <td>
                                                <div class="trim" contenteditable>
                                                    {{$good->name}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="trim">
                                                    {{$good->category->name}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="trim">
                                                    ￥{{$good->price}}
                                                </div>
                                            </td>

                                            <td>

                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <div class="trim">
                                                        <a href="/admin/good/{{$good->id}}/restore">
                                                            <button type="button" class="btn btn-xs btn-info">
                                                               还原
                                                            </button>
                                                        </a>
                                                        <a href="/admin/good/{{$good->id}}/forceDelete" data-method="delete" data-token="{{csrf_token()}}">
                                                            <button class="btn btn-xs btn-danger">
                                                              删除
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
            </form>
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

        $(function () {
            $("#delete").click(function(){
                var length = $('.select_id:checked').length;
                if (length == 0) {
                    alert('您必须至少选择一条记录');
                }

                var values = $("#form").serialize();

                $.ajax({
                    type: "DELETE",
                    data: values,
                    url: "/admin/good/select_del",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });
            })

            $("#restore").click(function(){
                var length = $('.select_id:checked').length;
                if (length == 0) {
                    alert('您必须至少选择一条记录');
                }

                var values = $("#form").serialize();

                $.ajax({
                    type: "DELETE",
                    data: values,
                    url: "/admin/good/select_restore",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });
            })


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


            $(".is_show").click(function () {

                if ($(this).is(':checked') == true) {
                    is_show = 0;
                } else {
                    is_show = 1;
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

        })



    </script>



@endsection