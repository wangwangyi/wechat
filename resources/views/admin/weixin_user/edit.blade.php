@extends('admin.layouts.layout')
@section('css')

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

                                        <div class="space"></div>

                                            <div class="timeline-container">
                                                {{--<div class="timeline-label">
													<span class="label arrowed-in-right label-lg
													@if($order->status == 1 ||$order->status ==5) label-grey
													@elseif($order->status ==2 ||$order->status ==3 ||$order->status ==4) label-primary
													@endif">{{order_status($order->status)}}</span>
                                                </div>--}}

                                                <div class="timeline-items">

                                                    <div class="timeline-item clearfix">
                                                        <div class="timeline-info">
                                                        </div>

                                                        <div class="widget-box transparent">
                                                            <div class="widget-header widget-header-small hidden"></div>

                                                            <div class="widget-body">
                                                                <div class="widget-main">
                                                                    {{date('Y年m月d日 H:s',strtotime($orders->order->created_at))}}
                                                                    &nbsp;&nbsp;&nbsp;<span>姓名：{{$orders->name}}</span>
                                                                    &nbsp;&nbsp;&nbsp;<span>订单号：{{--{{$orders->order->express_code}}--}}</span>
                                                                    <div class="pull-right" id="text">
                                                                        <span class="price">订单金额：<span>{{--{{doubleval($orders->order->total_price)}}--}}</span>元</span>
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
                                                                       {{-- <a href="{{route('admin.order.edit',$order->id)}}">
                                                                            <button class="btn btn-light">订单详情</button>
                                                                        </a>--}}
                                                                    </div>
                                                                    <div class="space-6"></div>

                                                                   {{-- @foreach ($order->order_goods as $good)
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
                                                                    @endforeach--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>




                                    </div>
                                </div>
                                <div style="margin-left: 800px;">
                                    <ul class="pagination">
                                        <li>
                                         {{--   {!! $orders->links() !!}--}}
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

    <script>
        $(function(){

        })
    </script>
@endsection