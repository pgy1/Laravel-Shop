@extends('app')

@section('content')
    <div class="container">

        <div style="height: 20px;"></div>

        <div class="row">

            <div class="col-sm-12 blog-main">

                <h1 class="blog-title">订单号：<span style="font-size: 24px;">{{ $past->pastid }}</span></h1>


            </div>

        </div>

        <div class="row">

            <div class="col-sm-4 blog-main">

                <div class="blog-post">
                    <div class="image">
                        <img src="{{ url($past->image) }}" width="350" height="250">
                    </div>

                </div>

            </div>
            <!-- /.blog-main -->


            <div class="col-sm-7 col-sm-offset-1 blog-sidebar">

                <h2 class="blog-title">{{ $past->pname }}</h2>

                <p class="lead blog-description">价格：<span style="color: red;">￥{{ $past->price }}</span></p>
                <div class="btn-group">
                    <p class="lead blog-description">支付方式：</p>
                    <a href="{{ url('/past/create').'/'.$past->pastid }}">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;支付宝
                        </button>
                    </a>
                    <a href="{{ url('/favorite/create').'/'.$past->pastid }}">
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;微信
                        </button>
                    </a>
                    <a href="{{ url('/favorite/create').'/'.$past->pastid }}">
                        <button class="btn btn-warning">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;银联
                        </button>
                    </a>
                </div>

            </div>
            <!-- /.blog-sidebar -->

        </div>
        <!-- /.row -->

    </div>
@endsection
