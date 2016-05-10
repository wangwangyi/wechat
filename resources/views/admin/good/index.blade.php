@extends('admin.layouts.layout')
@section('css')
    <link rel="stylesheet" href="/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/assets/css/daterangepicker.css" />
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
        line-height: 76px;
    }
    .c_price{
        margin-top: 20px;
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
                    <a href="#">控制台</a>
                </li>
                <li class="active">商品管理</li>
                <li>
                    <a href="/admin/good">商品列表</a>
                </li>

            </ul>

        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                   商品列表
                </h1>
            </div><!-- /.page-header -->
            @include('admin.layouts._msg')
            <p>
                <a href="/admin/good/create">
                    <button class="btn btn btn-primary">
                        <i class="icon-share-alt bigger-200"></i>
                        新增
                    </button>
                </a>
                    <button class="btn btn btn-danger" id="del_select">
                        <i class="icon-trash bigger-200"></i>
                        删除
                    </button>

            <form method="get">

            <table id="sample-table-1" class="table table-striped table-bordered table-hover">

            <tr>
                    <td>
                            <input type="text" id="form-field-4" placeholder="商品名称" name="keyword" value="{{Request::input('keyword')}}">
                    </td>
                  <td>
                            <select class="col-xs-10 col-sm-8" id="form-field-1" name="category_id" style="width:195px;">
                                <option value="">所有分类</option>
                                @foreach ($filter_categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach ($category->children as $c)
                                            <option value="{{$c->id}}" @if($c->id == Request::input('category_id')) selected @endif>
                                                {{$c->name}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                    </td>
                    <td>
                            <select class="col-xs-10 col-sm-8" id="form-field-1" name="brand_id" style="width:150px;">
                                <option value="">商品品牌</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if(Request::get('brand_id') == $brand->id) selected @endif>{{$brand->name}}</option>
                                    @endforeach
                            </select>
                    </td>
                    <td>
                            <select class="col-xs-10 col-sm-8" id="form-field-1" name="price" style="width:150px;">
                                <option value="">商品价格</option>
                                <option value="0-100" @if(Request::get('price') == '0-100') selected @endif>0-100</option>
                                <option value="100-500" @if(Request::get('price') == '100-500') selected @endif>100-500</option>
                                <option value="500-1000" @if(Request::get('price') == '500-1000') selected @endif>500-1000</option>
                                <option value="1000-1500" @if(Request::get('price') == '1000-1500') selected @endif>1000-1500</option>
                                <option value="1500-2000" @if(Request::get('price') == '1500-2000') selected @endif>1500-2000</option>
                                <option value="2000-3000" @if(Request::get('price') == '2000-3000') selected @endif>2000-3000</option>
                                <option value="3000-4000" @if(Request::get('price') == '3000-4000') selected @endif>3000-4000</option>
                                <option value="4000-5000" @if(Request::get('price') == '4000-5000') selected @endif>4000-5000</option>
                                <option value="5000-20000" @if(Request::get('price') == '5000-20000') selected @endif>5000以上</option>
                            </select>

                    </td>
                    <td>
                            <div class="col-xs-10 col-sm-8" style="width:200px;">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon-calendar bigger-110"></i>
                                    </span>
                                    <input class="form-control" type="text" value="{{Request::input('created_at')}}" name="created_at" id="id-created_at-1" />
                                </div>
                            </div>
                    </td>

                <td>
                    <button class="btn btn-info" type="submit">
                        <i class="icon-search nav-search-icon"></i>
                        查找
                    </button>
                </td>
                </tr>
                </table>

            </form>

            </p>

            <form id="form" action="">
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
                                        <th>上架</th>
                                        <th>精品</th>
                                        <th>新品</th>
                                        <th>热销</th>
                                        <th>库存</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($goods as $good)
                                    <tr>
                                        <td class="center">
                                            <div class="trim">
                                            <label>
                                                <input type="checkbox" class="ace del_id" name="del_id[]"
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
                                        <td >
                                            <div class="trim">
                                            {{$good->name}}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="trim">
                                            {{$good->category->name}}
                                            </div>
                                        </td>
                                        <td>
                                                <input class="col-xs-6 change_price c_price" data-id="{{$good->id}}" type="text" id="form-field-5" value="{{number_format($good->price,2)}}">
                                        </td>
                                        <td>
                                            <div class="trim">
                                                <label>
                                                    <input name="form-field-checkbox" class="ace ace-checkbox-2 " type="checkbox" data-type="onsale" data-id="{{$good->id}}"
                                                    @if ($good->onsale == 0)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="trim">
                                                <label>
                                                    <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox"  data-type="best" data-id="{{$good->id}}"
                                                           @if ($good->best == 0)
                                                           checked
                                                            @endif
                                                    >
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="trim">
                                                <label>
                                                    <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox"  data-type="new_good" data-id="{{$good->id}}"
                                                           @if ($good->new_good == 0)
                                                           checked
                                                            @endif
                                                    >
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="trim">
                                                <label>
                                                    <input name="form-field-checkbox" class="ace ace-checkbox-2 " type="checkbox" data-type="hot" data-id="{{$good->id}}"
                                                           @if ($good->hot == 0)
                                                           checked
                                                            @endif
                                                    >
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="trim">
                                            {{$good->inventory}}
                                            </div>

                                        </td>
                                        <td>

                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <div class="trim">
                                                    <a href="{{route('admin.good.edit', $good->id)}}">
                                                        <span class="label label-lg label-pink arrowed-right"><i class="icon-edit bigger-120"></i></span>
                                                        </a>
                                                    <a href="good/{{$good->id}}" data-method="delete"
                                                       data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?">
                                                    <span class="label label-lg label-yellow arrowed-in"><i class="icon-trash bigger-120"></i></span>
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
                                            {!! $goods->appends(Request::all())->links() !!}
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
    <script src="/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="/assets/js/date-time/daterangepicker.min.js"></script>
    <script src="/assets/js/date-time/moment.min.js"></script>
    <script src="/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/date-time/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {

            $(".trash").removeClass('active');

                $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
            $('input[name=created_at]').daterangepicker().prev().on(ace.click_event, function(){
                $(this).next().focus();
            });

           /* $('#timepicker1').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false

            }).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });*/

        /*    $('#colorpicker1').colorpicker();*/

            $('#simple-colorpicker-1').ace_colorpicker();

            $(".change_price").change(function () {
                var info = {
                    id: $(this).data("id"),
                    price: $(this).val()
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/good/change_price",
                });
            })

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
                    url: "/admin/good/del_select",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });

            })


            $("input[type='checkbox']").click(function(){
                var info = {
                     type : $(this).data("type"),
                     value: $(this).is(':checked'),
                     id : $(this).data("id")
                }
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/good/change_attr",
                    success: function(data){
                        console.log(data);
                    }
                })
            });



        })



    </script>



@endsection