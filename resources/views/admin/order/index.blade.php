@extends('admin.layouts.layout')
@section('css')
    <link rel="stylesheet" href="/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/assets/css/daterangepicker.css" />
<style>
    #text{
        margin-top: -10px;
        margin-right: 40px;;
        }

    .price span{
        font-size: 25px;
    }
    #desc{
        margin-left: 20px;;
    }
  #img{
      margin-top: 10px;
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
                <li class="active">订单管理</li>
            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="widget-box transparent invoice-box">
                                <div class="widget-header widget-header-large">
                                    <h3 class="grey lighter pull-left position-relative">
                                        <i class="icon-leaf green"></i>
                                        订单管理 / <small>订单列表</small>
                                    </h3>

                                </div>


                                <div class="widget-body">

                                    <div class="widget-main padding-24">

                                        <form method="get">
                                        <table style="margin-left: 25px;">


                                            <tr>
                                               {{-- <td>
                                                    <input type="text" id="name" placeholder="姓名" name="address_id" value="{{Request::input('address_id')}}">
                                                </td>--}}
                                                <input type="hidden" name="weixin_user_id"
                                                       value="{{ Request::input('weixin_user_id') }}">
                                                <td>
                                                    <input type="text" id="form-field-4" placeholder="订单号" name="express_code" value="{{Request::input('express_code')}}">
                                                </td>
                                                <td>
                                                    <input type="text" id="form-field-4" placeholder="订单金额（eg:>100）" name="total_price" value="{{Request::input('total_price')}}">
                                                </td>

                                                <td>
                                                    <select class="col-xs-10 col-sm-8" id="form-field-1" name="status" style="width:150px;">
                                                        <option value="">交易状态</option>
                                                        @foreach($order_status as $k=>$v)
                                                            <option value="{{ $k }}"
                                                                    @if(Request::get('status') === $k) selected @endif
                                                            >{{ $v }}</option>
                                                        @endforeach
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
                                        <div class="space"></div>
                                        @foreach($orders as $order)
                                        <div class="timeline-container">
                                            <div class="timeline-label">
													<span class="label arrowed-in-right label-lg
													@if($order->status == 1 ||$order->status ==5) label-grey
													@elseif($order->status ==2 ||$order->status ==3 ||$order->status ==4) label-primary
													@endif">{{order_status($order->status)}}</span>
                                            </div>

                                            <div class="timeline-items">

                                                <div class="timeline-item clearfix">
                                                    <div class="timeline-info">
                                                    </div>

                                                    <div class="widget-box transparent">
                                                        <div class="widget-header widget-header-small hidden"></div>

                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                              {{date('Y年m月d日 H:s',strtotime($order->created_at))}}
                                                                &nbsp;&nbsp;&nbsp;<span>姓名：{{$order->weixin_user->name}}</span>
                                                                &nbsp;&nbsp;&nbsp;<span>订单号：{{$order->express_code}}</span>
                                                                <div class="pull-right" id="text">
                                                                    <span class="price">订单金额：<span>{{doubleval($order->total_price)}}</span>元</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="timeline-item clearfix">
                                                    <div class="timeline-info">
                                                    </div>

                                                    <div class="widget-box transparent">


                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <div class="pull-right" id="text">
                                                                    <a href="{{route('admin.order.edit',$order->id)}}">
                                                                    <button class="btn btn-light">订单详情</button>
                                                                        </a>
                                                                </div>
                                                                <div class="space-6"></div>

                                                                @foreach ($order->order_goods as $good)
                                                                <div class="widget-toolbox clearfix">
                                                                    <div class="pull-left" id="img">
                                                                        <img alt="Image 4" width="80" src="{{$good->good->thumb}}">
                                                                    </div>
                                                                    <div class="pull-left" id="desc">
                                                                        {{$good->good->name}}
                                                                        <br>
                                                                        {{doubleval($good->good->price)}}元×{{$good->number}}
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        @endforeach


                                    </div>
                                </div>
                                <div style="margin-left: 800px;">
                                    <ul class="pagination">
                                        <li>
                                            {!! $orders->links() !!}
                                        </li>
                                    </ul>
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
    <script src="/assets/js/date-time/daterangepicker.min.js"></script>
    <script src="/assets/js/date-time/moment.min.js"></script>
    <script src="/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/date-time/bootstrap-timepicker.min.js"></script>
    <script>
        $(function(){
            $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
            $('input[name=created_at]').daterangepicker().prev().on(ace.click_event, function(){
                $(this).next().focus();
            });
        })
    </script>
@endsection