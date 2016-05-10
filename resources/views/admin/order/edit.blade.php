@extends('admin.layouts.layout')
@section('css')
    <style>
        .dd-handle span{
            margin-left:30px;
        }
        .dd2-content span{ margin-left:30px;}

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
                <li>
                    <a href="/admin/order">订单管理</a>
                </li>
                <li class="active">订单详情</li>
            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-15">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="widget-box transparent invoice-box">
                                <div class="widget-header widget-header-large">
                                    <h3 class="grey lighter pull-left position-relative">
                                        <i class="icon-leaf green"></i>
                                        订单管理 / <small>订单详情</small>
                                    </h3>

                                </div>
                                <div class="space-6"></div>
                                {{--配货--}}
                                @if($order->status == 2)

                                        <button id="picking" class="btn btn-info"><i class="icon-shopping-cart bigger-160"></i>配货</button>
                                @endif


                                {{--发货--}}
                                @if(in_array($order->status, [3, 4]))
                                <form>
                                    <table style="margin-left: 500px;">

                                        <tr>
                                            <td>
                                                <select class="col-xs-10 col-sm-8" style="width:150px;" id="express_id">
                                                        @foreach ($expresses as $express)
                                                            <option value="{{$express->id}}" @if($order->express_id == $express->id) selected @endif>{{$express->name}}</option>
                                                        @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" id="express_code"  value="{{$order->express_code}}">
                                            </td>
                                            <td>
                                                <button class="btn btn-info" type="submit" id="shipping" data-status="{{$order->status}}">
                                                    <i class="icon-search nav-search-icon"></i>
                                                    @if($order->status ==3)
                                                        发货
                                                    @endif
                                                    @if($order->status ==4)
                                                        修改快递信息
                                                    @endif
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                @endif
                                <div class="widget-body">
                                    <div class="widget-main padding-24">
                                        <div id="fuelux-wizard" class="row-fluid" data-target="#step-container" style="width:950px;">
                                            <ul class="wizard-steps">
                                                <li data-target="#step1" class="active">
                                                    <span class="step"><small>下单</small></span>
                                                    <span class="title"> {{date('Y年m月d日 H:i',strtotime($order->created_at))}}</span>
                                                </li>

                                                <li data-target="#step2" class="@if($order->status >=2) active @endif">
                                                    <span class="step"><small>付款</small></span>
                                                    <span class="title">{{date('Y年m月d日 H:i',strtotime($order->pay_time))}}</span>
                                                </li>

                                                <li data-target="#step3" class="@if($order->status >=3) active @endif">
                                                    <span class="step"><small>配货</small></span>
                                                    <span class="title">{{date('Y年m月d日 H:i',strtotime($order->picking_time))}}</span>
                                                </li>

                                                <li data-target="#step4" class="@if($order->status >=4) active @endif">
                                                    <span class="step"><small>出库</small></span>
                                                    <span class="title">{{date('Y年m月d日 H:i',strtotime($order->shipping_time))}}</span>
                                                </li>
                                                <li data-target="#step5" class="@if($order->status ==5) active @endif">
                                                    <span class="step"><small>完成</small></span>
                                                    <span class="title">{{date('Y年m月d日 H:i',strtotime($order->finish_time))}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space"></div>


                                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <td>收货人信息</td>
                                            </tr>

                                            <tr>

                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="dd dd-draghandle">

                                                                <ol class="dd-list">
                                                                    <li class="dd-item dd2-item" data-id="16">
                                                                        <div class="dd-handle dd2-handle">
                                                                            <i class="normal-icon icon-user red bigger-130"></i>

                                                                            <i class="drag-icon icon-move bigger-125"></i>
                                                                        </div>
                                                                        <div class="dd2-content">收货人<span>{{$order->order_address->name}}</span></div>
                                                                    </li>

                                                                    <li class="dd-item dd2-item dd-colored" data-id="17">
                                                                        <div class="dd-handle dd2-handle">
                                                                            <i class="normal-icon icon-edit bigger-130"></i>

                                                                            <i class="drag-icon icon-move bigger-125"></i>
                                                                        </div>
                                                                        <div class="dd2-content no-hover">电话<span>{{$order->order_address->tel}}</span></div>
                                                                    </li>

                                                                    <li class="dd-item dd2-item" data-id="18">
                                                                        <div class="dd-handle dd2-handle">
                                                                            <i class="normal-icon icon-eye-open green bigger-130"></i>

                                                                            <i class="drag-icon icon-move bigger-125"></i>
                                                                        </div>
                                                                        <div class="dd2-content">地址<span>{{$order->order_address->province}} {{$order->order_address->city}} {{$order->order_address->area}} {{$order->order_address->detail}}</span></div>
                                                                    </li>
                                                                </ol>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </td>
                                            </tr>
                                            </table>

                                        @if($order->status >= 4)
                                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <td>物流信息</td>
                                            </tr>

                                            <tr>

                                                <td>
                                                    <iframe src="http://m.kuaidi100.com/index_all.html?type={{ $order->express->key}}&postid={{ $order->express_code}}" frameborder="0" width="100%" height="500"></iframe>

                                                </td>
                                            </tr>
                                        </table>
                                            @endif

                                        <div class="space"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                                        <b>支付方式及送货时间</b>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <ul class="list-unstyled spaced">
                                                        <li>
                                                            <i class="icon-caret-right blue"></i>
                                                            支付方式:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$order->pay_type=='1' ? '在线支付' : '货到付款'}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="icon-caret-right blue"></i>
                                                            送货时间:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>不限送货时间</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- /span -->

                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                                        <b>订单信息</b>
                                                    </div>
                                                </div>

                                                <div>
                                                    <ul class="list-unstyled  spaced">
                                                        <li>
                                                            <i class="icon-caret-right green"></i>
                                                            商品总价:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{doubleval($order->total_price)}}元</span>
                                                        </li>
                                                        <li>
                                                            <i class="icon-caret-right green"></i>
                                                            运  &nbsp; 费:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{doubleval($order->express->shopping_money)}}元</span>
                                                        </li>
                                                        <li>
                                                            <i class="icon-caret-right green"></i>
                                                            订单金额:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{doubleval($order->total_price + $order->express->shopping_money)}}元</span>
                                                        </li>
                                                        <li>
                                                            <i class="icon-caret-right green"></i>
                                                            实付金额:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:red;font-size: 20px;">{{doubleval($order->total_price + $order->express->shopping_money)}}元</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- /span -->
                                        </div>
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
    <script src="/assets/js/jquery.nestable.min.js"></script>

    <script>
        $(function(){
            $('.dd').nestable();
            $('.dd-handle a').on('mousedown', function(e){
                e.stopPropagation();
            });


            //配货
            $("#picking").click(function () {
                var id = "{{$order->id}}";

                $.ajax({
                    url: '/admin/order/picking',
                    type: 'PATCH',
                    data: {id: id},
                    success: function (data) {
                        location.href = location.href;
                    }
                });
            });

            $("#shipping").click(function () {
                var data = {
                    id: "{{$order->id}}",
                    status: $(this).data('status'),
                    express_code: $("#express_code").val(),
                    express_id : $("#express_id").val()
                }

                console.log(data);
                $.ajax({
                    url: '/admin/order/shipping',
                    type: 'PATCH',
                    data: data,
                    success: function (data) {
                        location.href = location.href;
                    }
                });
                return false;
            })
        })
    </script>
@endsection