@extends('shop.layouts.application')
@section('title')
<title>订单详情</title>
@endsection
@section('content')
    <div class="page-order-view" data-log="订单详情">

        <div class="page-order-view-wrap">
            <div>
                <div class="b1">
                    <div class="b11"><p><strong>订单编号：</strong><span>{{$order->id}}</span></p></div>
                    <div class="b11"><p><strong>订单状态：</strong><span>{{order_status($order->status)}}</span></p></div>
                </div>

                <div class="ui_line"></div>
             <div class="b1">
                    <div class="b12">
                        <ul>
                            <li class="done">
                                <div class="mark"><p>下单</p></div>
                                <div class="time"><p>{{ $order->created_at->format("Y/m/d H:i") }}</p></div>
                            </li>
                            <li class="@if($order->status >= 2) done @endif">
                                <div class="mark"><p>付款</p></div>
                                <div class="time"><p>{{ time_format("Y/m/d H:i", $order->pay_time) }}</p></div>
                            </li>
                            <li class="@if($order->status >= 3) done @endif">
                                <div class="mark"><p>配货</p></div>
                                <div class="time"><p>{{ time_format("Y/m/d H:i", $order->picking_time) }}</p></div>
                            </li>
                            <li class="@if($order->status >= 4) done @endif">
                                <div class="mark"><p>出库</p></div>
                                <div class="time"><p>{{ time_format("Y/m/d H:i", $order->shipping_time) }}</p></div>
                            </li>
                            <li class="@if($order->status >= 5) done @endif">
                                <div class="mark"><p>交易成功</p></div>
                                <div class="time"><p>{{ time_format("Y/m/d H:i", $order->finish_time) }}</p></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b8">
                    <div>
                        <div class="b81">
                            <p>
                                <strong>物流信息：</strong>
                                <span>{{$order->express->name or ''}}</span>
                                <span>{{$order->express_code or ''}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="ui_line"></div>
                <div class="b3">
                    <ul>

                        @foreach($order->order_goods as $order_good)
                            <li>
                                <div class="ui-box">
                                    <div class="img"><img src="{{$order_good->good->thumb}}"></div>
                                    <div class="ui-box-flex">
                                        <div class="name"><p>{{$order_good->good->name}}</p></div>
                                        <div class="price">
                                            <p>
                                                <strong>{{doubleval($order_good->good->price) * $order_good->number}}
                                                    元</strong>
                                                <span>售价：</span>
                                                <span>{{doubleval($order_good->good->price)}}元</span>
                                                <span>x {{$order_good->number}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ui_line"></div>
            </div>
            <div>
                <div class="b4">
                    <ul>
                        <li><strong>下单日期：</strong><span>{{ $order->created_at->format("Y/m/d H:i") }}</span></li>
                        <li class="address">
                            <div><strong>收货地址：</strong></div>
                            <div class="info">
                                <span>{{$order->order_address->province}}</span>
                                <span>{{$order->order_address->city}}</span>
                                <span>{{$order->order_address->area}}</span>
                                <span>{{$order->order_address->detail}}</span>
                            </div>
                        </li>
                        <li><strong>收货人名：</strong><span>{{$order->order_address->name}} </span><span
                                    class="tel">{{$order->order_address->tel}}</span></li>

                    </ul>
                </div>
                <div class="ui_line"></div>
                <div class="b5">
                    <div class="b51"><p><strong>商品价格：</strong><strong>{{doubleval($order->total_price)}}元</strong></p>
                    </div>
                <div class="b51"><p><strong>配送费用：</strong><strong>{{doubleval($order->express->shopping_money)}}元</strong></p>
                    </div>
                    <div class="b52"><p>
                            <strong>应付总额：</strong><strong>{{doubleval($order->total_price+$order->express->shopping_money)}}
                                元</strong></p></div>
                </div>

                @if($order->status == '1')
                    <div class="b7">
                        <div class="ui-box">
                            <div class="ui-box-flex price">
                                <p>
                                    {{--<span>应付总额：</span><br>
                                    <strong>{{doubleval($order->total_price+$order->express->shopping_money)}}元</strong>--}}
                                </p>
                            </div>
                            <div class="ui-box-flex">
                                <a href="/order/{{$order->id}}" data-method="delete"
                                   class="ui-button ui-button-gray"><span>取消订单</span></a>
                            </div>
                            <div class="ui-box-flex">
                                <a href="/order/pay/{{$order->id}}" class="ui-button"><span>立即支付</span></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </div>
@endsection