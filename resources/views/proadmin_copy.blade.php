@extends('app')

<script type="text/javascript" charset="utf-8" src="{{ url('/laravel-u-editor/ueditor.config.js') }}"> </script>
<script type="text/javascript" charset="utf-8" src="{{ url('/laravel-u-editor/ueditor.all.min.js') }}"> </script>

@section('content')
    <div class="container-fluid">
        <br />
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" enctype="multipart/form-data" id="my_form" role="form" method="POST" action="{{ url('/product/post') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="title">标题</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="标题" />
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-2 control-label">选择分类</label>--}}
                        {{--<div class="col-sm-10">--}}
                        {{--<select class="form-control col-xs-4" name="special">--}}
                            {{--<option>物品</option>--}}
                            {{--<option>活动</option>--}}
                            {{--<option>文章</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <!-- 加载编辑器的容器 -->
                    <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
                    <!-- 实例化编辑器 -->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">点击发布</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection
@section('jquery')
    <script type="text/javascript" src="{{ asset("js/jquery.form.js") }}"></script>
    <script type="text/javascript">
        {{--//删除操作--}}
        {{--$(function(){--}}
            {{--var options = {--}}
                {{--success: showResponse, //处理完成--}}
                {{--resetForm: true,--}}
                {{--dataType: 'json'--}}
            {{--};--}}
            {{--$('#my_form').submit(function() {--}}
                {{--$(this).ajaxSubmit(options);--}}
                {{--return false;--}}
            {{--});--}}
        {{--});--}}
        {{--function showResponse(responseText, statusText) {--}}
            {{--alert(responseText.errMsg);--}}
            {{--if(responseText.errNum == 0){--}}
                {{--location.href = '{{ url('/product') }}';--}}
            {{--}--}}
            {{--return false;--}}
        {{--}--}}
    </script>
@endsection
