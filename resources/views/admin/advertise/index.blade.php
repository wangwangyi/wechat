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

                <li class="active">广告列表</li>
            </ul>


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
                                        广告
                                    </h3>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-24">
                                        <a href="{{route('admin.advertise.create')}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="icon-reply bigger-110"></i>
                                                <span class="bigger-110 no-text-shadow">新增</span>
                                            </button>
                                        </a>

                                        <div class="space"></div>

                                        <div>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>编号</th>
                                                    <th>广告位置</th>
                                                    <th>广告描述</th>
                                                    <th>是否显示</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($advertises as $advertise)
                                                <tr>
                                                    <th scope="row">{{$advertise->id}}</th>
                                                    <td>{{$advertise->name}}</td>
                                                    <td>{{$advertise->desc}}</td>
                                                    <td>
                                                        <label>
                                                            <input class="ace ace-switch ace-switch-5 is_show" data-id="{{$advertise->id}}" name="is_show"  type="checkbox"
                                                                   @if ($advertise->is_show == 0)
                                                                   checked
                                                                    @endif>
                                                            <span class="lbl"></span>
                                                        </label>

                                                    </td>
                                                    <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                            <a class="green" href="{{route('admin.advertise.edit',$advertise->id)}}">
                                                                <i class="icon-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red" href="advertise/{{$advertise->id}}" data-method="delete">
                                                                <i class="icon-trash bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                    @foreach($advertise['children'] as $adv)
                                                        <tr>
                                                            <th scope="row">{{$adv->id}}</th>
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$adv->name}}</td>
                                                            <td>{{$adv->desc}}</td>
                                                            <td>
                                                                <label>
                                                                    <input class="ace ace-switch ace-switch-5 is_show" data-id="{{$adv->id}}" name="is_show"  type="checkbox"
                                                                           @if ($adv->is_show == 0)
                                                                           checked
                                                                            @endif>
                                                                    <span class="lbl"></span>
                                                                </label>

                                                            </td>
                                                            <td>
                                                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                                    <a class="green" href="{{route('admin.advertise.edit',$adv->id)}}">
                                                                        <i class="icon-pencil bigger-130"></i>
                                                                    </a>

                                                                    <a class="red" href="advertise/{{$adv->id}}" data-method="delete">
                                                                        <i class="icon-trash bigger-130"></i>
                                                                    </a>
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
                url: "/admin/advertise/is_show",
            })

        })
    })
</script>
@endsection