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
                <li class="active">新增属性</li>
            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" action="{{ route('admin.type.{type_id}.attribute.store', $type_id) }}" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 属性名称 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="*必填" class="col-xs-10 col-sm-5" name="name">
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">所属商品类型</label>

                            <div class="col-sm-3">
                                <select class="form-control" id="form-field-select-1" name="type_id">
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                </select>
                                <div class="space-2"></div>

                                <div class="help-block" id="input-size-slider"></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 属性是否可选 </label>
                            <div class="col-sm-9">
                                <input type="radio" name="attr_type" value="0" checked="">唯一属性
                                <input type="radio" name="attr_type" value="1">单选属性
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 该属性的录入方式 </label>
                            <div class="col-sm-9">
                                    <input type="radio" name="input_type" value="0" checked="">手工录入
                                    <input type="radio" name="input_type" value="1">从下面的列表中选择（一行代表一个可选值）
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5">可选值列表</label>

                            <div class="col-sm-6">
                                <div class="clearfix">

                                    <textarea rows="5" name="value" class="form-control limited" id="form-field-9" maxlength="50"></textarea>
                                </div>

                                <div class="space-2"></div>

                                <div class="help-block" id="input-span-slider"></div>
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>




                    </form>

                </div><!-- /.col -->
            </div>
        </div><!-- /.page-content -->
    </div>
@endsection

@section('js')
<script>
    $(function(){

    })
</script>
@endsection