@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">控制台</a>
                </li>
                <li class="active">文章管理</li>
                <li>
                    <a href="/admin/article">文章列表</a>
                </li>

            </ul><!-- .breadcrumb -->

        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                    @include('admin.layouts._msg')

                    <h3 class="header smaller lighter blue">分类管理</h3>
                    <p>
                        <a href="{{route('admin.article.create')}}" class="btn btn-app btn-primary btn-xs">
                            <i class="icon-envelope bigger-200"></i>
                            新增
                        </a>
                    </p>


                    <form id="form" action="">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-responsive">

                                            <table id="sample-table-1" class="table table-striped  table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="center">
                                                        <label>
                                                            <input type="checkbox" class="ace">
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </th>
                                                    <th>编号</th>
                                                    <th>文章标题</th>
                                                    <th>所属分类</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($articles as $article)
                                                    <tr>
                                                        <td class="center">
                                                            <div class="trim">
                                                                <label>
                                                                    <input type="checkbox" class="ace del_id" name="del_id[]"
                                                                           value="{{$article->id}}"/>
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                        </td>

                                                        <td>{{$article->id}}</td>

                                                        <td>{{$article->title}}</td>

                                                        <td>{{$article->category_id }}</td>

                                                        <td>
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                                <div class="trim">
                                                                    <a href="{{route('admin.article.edit', $article->id)}}">
                                                                        <span class="label label-lg label-pink arrowed-right"><i class="icon-edit bigger-120"></i></span>
                                                                    </a>
                                                                    <a href="article/{{$article->id}}" data-method="delete"
                                                                       data-token="{{csrf_token()}}" data-confirm="确认删除当文章吗?">
                                                                        <span class="label label-lg label-yellow arrowed-in"><i class="icon-trash bigger-120"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div style="margin-left: 800px;">
                                                <ul class="pagination">
                                                    <li>
                                                     {{--   {!! $goods->links() !!}--}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- /.table-responsive -->
                                    </div><!-- /span -->

                                </div><!-- /row -->


                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(function(){

            $('table th input:checkbox').on('click', function () {
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function () {
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });

            });


        })
    </script>

@endsection