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
                    <a href="/admin/type">物流运费</a>
                </li>
            </ul><!-- .breadcrumb -->

        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal"  action="{{ route('admin.express.update',$express->id) }}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                        <input type="hidden" name="id" value="{{$express->id}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 物流运费 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" value="{{$express->shopping_money}}" name="shopping_money">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 满额免物流费 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" value="{{$express->shopping_free}}" name="shopping_free">
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5">物流描述</label>

                            <div class="col-sm-6">
                                <div class="clearfix">

                                    <textarea rows="5" name="desc" class="form-control limited" id="form-field-9" maxlength="50">{{$express->desc}}</textarea>
                                </div>

                                <div class="space-2"></div>

                                <div class="help-block" id="input-span-slider"></div>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否可用 </label>
                            <div class="col-sm-9">
                                <input type="radio" name="enabled" value="0" @if($express->enabled == 0) checked @endif>是
                                <input type="radio" name="enabled" value="1" @if($express->enabled == 1) checked @endif>否
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

@endsection