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
                <li>
                    <a href="/admin/type">商品管理</a>
                </li>
                <li class="active">属性列表</li>
            </ul><!-- .breadcrumb -->

    {{--        <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->--}}
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
                                        属性列表
                                    </h3>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-24">
                                        <a href="{{ route('admin.type.{type_id}.attribute.create', $type_id) }}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="icon-reply bigger-110"></i>
                                                <span class="bigger-110 no-text-shadow">新增</span>
                                            </button>
                                        </a>

                                        <div class="space"></div>

                                        <div>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="center">编号</th>
                                                    <th>属性名称</th>
                                                    <th class="hidden-xs">商品类型</th>
                                                    <th class="hidden-480">属性值的录入方式</th>
                                                    <th>可选值列表</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($attributes as $attribute)
                                                <tr>
                                                    <td class="center">{{$attribute->id}}</td>

                                                    <td>
                                                        {{$attribute->name}}
                                                    </td>
                                                    <td class="hidden-xs">
                                                        {{$attribute->type->name}}
                                                    </td>
                                                    <td class="hidden-480">
                                                        @if ($attribute->input_type == 0)
                                                            手工录入
                                                            @elseif($attribute->input_type == 1)
                                                            从列表中选择
                                                        @endif
                                                    </td>
                                                    <td>{{$attribute->value}}</td>
                                                    <td>
                                                        <a href="{{--{{route('admin.good.edit', $good->id)}}--}}">
                                                            <span class="label label-lg label-pink arrowed-right"><i class="icon-edit bigger-120"></i></span>
                                                        </a>
                                                        <a href="{{--good/{{$good->id}}--}}" data-method="delete"
                                                           data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?">
                                                            <span class="label label-lg label-yellow arrowed-in"><i class="icon-trash bigger-120"></i></span>
                                                        </a>
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

    <script>
        $(function(){

        })
    </script>
@endsection