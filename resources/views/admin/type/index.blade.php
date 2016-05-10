@extends('admin.layouts.layout')
@section('css')

    <style>
        .type{
            text-align: center;
        }
        .change_name{
           margin-left:80px;
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
                    <a href="/admin/type">商品类型</a>
                </li>
            </ul><!-- .breadcrumb -->

            {{--<div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->--}}
        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="lighter">
                                        <i class="icon-star orange"></i>
                                        商品类型
                                    </h4>

                                    <p>
                                        <a href="{{route('admin.type.create')}}">
                                            <button class="btn btn-primary">新增</button>
                                        </a>
                                    </p>
                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="icon-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    <i class="icon-caret-right blue"></i>
                                                    编号
                                                </th>

                                                <th>
                                                    <i class="icon-caret-right blue"></i>
                                                    商品类型名称
                                                </th>

                                                <th class="hidden-480">
                                                    <i class="icon-caret-right blue"></i>
                                                    属性数
                                                </th>
                                                <th class="hidden-480">
                                                    <i class="icon-caret-right blue"></i>
                                                    操作
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($types as $type)
                                            <tr class="type">
                                                <td>{{$type->id}}</td>

                                              <td>
                                                    <input class="col-xs-4 change_name" data-id="{{$type->id}}" type="text" id="form-field-5" value="{{$type->name}}">
                                                </td>
                                               {{-- <td contenteditable data-id="{{$type->id}}" class="change_name">
                                                    {{$type->name}}
                                                </td>--}}

                                                <td class="hidden-480">
                                                    {{$type->attributes->count()}}
                                                </td>
                                                <td class="hidden-480">

                                                       <a href="{{ route('admin.type.{type_id}.attribute.index', $type->id) }}">
                                                           <span class="label label-lg label-pink arrowed-right">
                                                            属性列表</span>
                                                       </a>
                                                    <a href="type/{{$type->id}}" data-method="delete">
                                                        <span class="label label-lg label-purple arrowed">删除</span>
                                                        </a>                                          </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!-- /widget-main -->
                                </div><!-- /widget-body -->
                            </div><!-- /widget-box -->
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
        $(function()
        {

            $(".change_name").blur(function () {
                var info = {
                    id: $(this).data("id"),
                    name: $(this).text()
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/type/change_name",
                });
            })
        })
    </script>
@endsection