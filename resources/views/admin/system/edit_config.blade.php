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

                <li class="active">系统管理</li>
                <li>
                    <a href="/admin/system/cache">清除缓存</a>
                </li>
            </ul><!-- .breadcrumb -->


        </div>
        @include('admin.layouts._msg')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="space-6"></div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="widget-box transparent invoice-box">

                                <div class="step-content row-fluid position-relative" id="step-container">
                                    <div class="step-pane active" id="step1">
                                        <h3 class="lighter block green">站点信息</h3>


                                        <form class="form-horizontal" action="/admin/system/update"  method="post" >

                                            {!! method_field('put') !!}
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">网站名称</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="name" value="{{$system->name}}" class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">关键词</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <textarea class="input-xlarge" value="{{$system->comment}}" name="comment"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">描述信息</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <textarea class="input-xlarge" value="{{$system->desc}}"  name="desc"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr hr-dotted"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">网站图标</label>

                                                <div class="col-sm-9">

                                                    <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="ico" value="{{$system->ico}}"  id="img">
                                                    <input type="file" style="display: none;" id="thumb">

                                                    <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload" style="float:left;">
                                                        <i class="icon-cloud-upload bigger-200" id="loading"></i>
                                                    </button>
                                                    <img src="/favicon.ico" id="img_show" style="max-height: 200px;margin-left: 30px;margin-top: 10px;">
                                                </div>

                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">ICP备案号</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="icp" value="{{$system->icp}}"  class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-2"></div>


                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">版权信息</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="copyright" value="{{$system->copyright}}" class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr hr-dotted"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">管理员</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" value="{{$system->admin}}" name="admin" class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">公司名</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="company" value="{{$system->company}}" class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr hr-dotted"></div>


                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">电子邮箱</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="email" value="{{$system->email}}" class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-8"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">联系电话</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="tel" value="{{$system->tel}}"  class="col-xs-12 col-sm-6">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix form-actions">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button class="btn btn-info" type="submit">
                                                        <i class="icon-ok bigger-110"></i>
                                                        Submit
                                                    </button>

                                                    &nbsp; &nbsp; &nbsp;
                                                    <button class="btn" type="reset">
                                                        <i class="icon-undo bigger-110"></i>
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="step-pane" id="step2">
                                        <div class="row-fluid">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>

                                                <strong>
                                                    <i class="icon-ok"></i>
                                                    Well done!
                                                </strong>

                                                You successfully read this important alert message.
                                                <br>
                                            </div>

                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>

                                                <strong>
                                                    <i class="icon-remove"></i>
                                                    Oh snap!
                                                </strong>

                                                Change a few things up and try submitting again.
                                                <br>
                                            </div>

                                            <div class="alert alert-warning">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                <strong>Warning!</strong>

                                                Best check yo self, you're not looking too good.
                                                <br>
                                            </div>

                                            <div class="alert alert-info">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                <strong>Heads up!</strong>

                                                This alert needs your attention, but it's not super important.
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step-pane" id="step3">
                                        <div class="center">
                                            <h3 class="blue lighter">This is step 3</h3>
                                        </div>
                                    </div>

                                    <div class="step-pane" id="step4">
                                        <div class="center">
                                            <h3 class="green">Congrats!</h3>
                                            Your product is ready to ship! Click finish to continue!
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
    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script>

        //文件上传
        $('#thumb_upload').on('click', function () {
            $("#thumb").click();
            return false;
        });
        var opts = {
            url: "/upload_icon",
            type: "POST",
            beforeSend: function () {
                $("#loading").attr("class", "icon-spinner icon-spin orange bigger-200");
            },
            success: function (result, status, xhr) {
//                console.log(result);
                if(result.status == "0") {
                    alert(result.info);
                }
                $("#loading").attr("class", "icon-cloud-upload bigger-200");
                var src = '/favicon.ico?'+Math.random();
                $("#img_show").attr('src', src);

            },
            error: function (result, status, errorThrown) {
                alert('文件上传失败');
            }
        }
        $('#thumb').fileUpload(opts);
        $(function(){
            $("#password").removeClass('active');
            $("#cache").removeClass('active');
        })
    </script>
@endsection