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

                <li class="active">系统设置</li>
                <li>
                    <a href="/admin/express">物流运费</a>
                </li>
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
                                        物流运费
                                    </h3>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-24">
                                        <a href="{{route('admin.express.create')}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="icon-reply bigger-110"></i>
                                                <span class="bigger-110 no-text-shadow">新增</span>
                                            </button>
                                        </a>

                                        <div class="space"></div>

                                        <div>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>编号</th>
                                                    <th>快递方式</th>
                                                    <th>配送方式描述</th>
                                                    <th>是否可用</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="active">
                                                    @foreach ($expresses as $express)
                                                    <th scope="row">{{$express->id}}</th>
                                                    <td>{{$express->name}}</td>
                                                    <td>{{$express->desc}}</td>
                                                    <td>@if($express->enabled == 0) 是 @else 否@endif</td>
                                                    <td>
                                                        <a href="{{route('admin.express.edit',$express->id)}}">
                                                        <button class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </button></a>
                                                        <a href="express/{{$express->id}}" data-method="delete"
                                                           data-token="{{csrf_token()}}">
                                                        <button class="btn btn-xs btn-danger">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </button></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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

@endsection