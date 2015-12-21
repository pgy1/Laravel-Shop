@extends('app_auth')

@section('content')
<div class="container">
    
    <div style="height: 20px;"></div>

    <div class="row">

        <div class="col-sm-4 blog-main">

            <div class="blog-post">

                <div class="image">
                    <img src="{{ url($product->images) }}" width="350">
                </div>

            </div>


        </div>
        <!-- /.blog-main -->

        <div class="col-sm-7 col-sm-offset-1 blog-sidebar">

            <h1 class="blog-title">{{ $product->name }}</h1>

            <p class="lead blog-description">价格：<span style="color: red;">￥{{ $product->price }}</span></p>
            <p class="lead blog-description">交易方式：{{ $product->payway }}</p>
            <p class="lead blog-description">截止日期：{{ date("Y年m月d日 H:i",$product->deadline) }}</p>
            <p class="lead blog-description">描述：{{ $product->description }}</p>
            <div class="btn-group">
                <a href="{{ url('/past/create').'/'.$product->pid }}">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;支付
                    </button>
                </a>
                <a href="{{ url('/favorite/create').'/'.$product->id }}">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;收藏物品
                    </button>
                </a>
            </div>

        </div>
        <!-- /.blog-sidebar -->

    </div>
    <!-- /.row -->

</div>
@endsection
