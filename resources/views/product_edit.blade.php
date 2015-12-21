@extends('app_auth')

@section('uploadcss')
<link href="{{ asset('/css/uploadify.css') }}" rel="stylesheet" />
@endsection

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

                <form class="form-horizontal" enctype="multipart/form-data" id="my_form" role="form" method="POST" action="{{ url('/product/create') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="title">商品名称</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="名称" />
                        </div>
                        <label class="col-md-2 col-md-offset-1 control-label">商品类别</label>
                        <div class="col-sm-3">
                        <select class="form-control col-xs-4" name="special">
                            <option>电子产品</option>
                            <option>体育用品</option>
                            <option>生活用品</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="content">商品描述</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="content" name="content" placeholder="描述" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="images">商品图片</label>
                        <div class="col-md-10">
                            {{--<button type="" class="btn btn-default">选取图片</button>--}}
		                    <div id="queue"></div>
                            <input type="file" id="images" name="images" multiple="true" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label" for="images"></label>
                        <div class="col-md-10 uploaded">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="price">商品价格</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="price" name="price" placeholder="价格" />
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                        <label class="col-md-2 col-md-offset-1 control-label" for="deadline">到期时间</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="deadline" name="deadline" placeholder="到期时间" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="payway">交易方式</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="payway" name="payway" placeholder="交易方式：时间、地点" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">发布商品</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('uploadify')
<script src="{{ url("js/jquery.uploadify.min.js") }}"></script>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#images').uploadify({
//            'debug' : 'true',
            'fileObjName' : 'images',//默认为FileData，后台获取文件的name值
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('24mim' . $timestamp);?>',
                '_token' : '{{ csrf_token() }}'
            },
            'buttonText' : '上传图片',
            'swf'      : '{{ asset("/uploadify/uploadify.swf") }}',
            'uploader' : '{{ url("product/upload") }}',
            'onUploadSuccess' : function(file, data, response) {
//                alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                var json = eval('('+data+')');
                var pics = json.pic;
                alert(pics);

                var images;
                for(var i = 0; i < pics.length; i++){
                    images = "<img src='"+pics+"' width='150' height='150' />";
                }

                if(json.success){
                    $(".uploaded").html(images);
                }
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            }
        });
    });
</script>
@endsection