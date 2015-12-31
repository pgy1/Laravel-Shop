@extends('app')

@section('content')

    <div class="splash">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h1>寻找你的"珍"爱</h1>

                </div>
            </div>
        </div>
    </div>

    <div id="car">
        <span class="carname"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;购物车</span>
        @foreach($favorites["products"] as $product)
            <?php $product = $product['product']?>
            {{--{{ dd($product) }}--}}
            <p class="proimg clearfix relative">
                <img src="{{ url($product->image) }}" class="fleft">
                <a href="{{ url('/product/show/145136053832813') }}" class="link">
                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                </a>
                <span class="proname" class="fleft">{{ $product->name }}</span>
            </p>
        @endforeach
        <p class="morecar">
            <a href="{{ url('/favorite/list') }}" class="btn btn-danger">结算<br /><span>￥{{ $favorites["sum"] }}</span></a>
        </p>
    </div>
    <div class="section-preview">
        <div class="container">
            <div class="row">
                @if(sizeof($data['products'])>0)
                @foreach($data['products'] as $key=>$product)
                <div class="col-lg-4 col-sm-6">
                    <div class="preview">
                        <div class="image positive">
                            <img src="{{ url($product->image) }}" width="360" height="288">

                            <div style="position: absolute;width:360px;bottom:-10px;right:0;text-align: left;">
                                <p class="well-sm alert-info">
                                    <span class="">商品名称：</span>
                                    <span class="">{{ $product->name }}</span><br />
                                    <span class="">商议价格：</span>
                                    <span class="" style="color: red;">￥{{ $product->price }}</span><br />
                                    <span class="">交易方式：</span>
                                    <span class="">{{ $product->payway }}</span><br />
                                    <span class="">到期时间：</span>
                                    <span class="">2015-12-09</span>
                                </p>
                            </div>
                        </div>
                        <br />
                        <div class="text-center">

                            <div class="btn-group">
                                <a href="{{ url('/product/show').'/'.$product->pid }}">
                                    <button class="btn btn-info">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;查看详情
                                    </button>
                                </a>
                                @if(Auth::guest())
{{--                                    <a href="{{ url('/favorite/cache').'/'.$product->pid }}">--}}
                                    <a href="{{ url('/favorite/create').'/'.$product->pid }}">
                                        <button class="btn btn-success">
                                            <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;加入购物车
                                        </button>
                                    </a>
                                @endif
                                @if(Auth::check())
                                    @if(isset($product->fid))
                                        <a href="{{ url('/favorite/cancel').'/'.$product->pid }}">
                                            <button class="btn btn-warning">
                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;已添加
                                            </button>
                                        </a>
                                        @else
                                        <a href="{{ url('/favorite/create').'/'.$product->pid }}">
                                            <button class="btn btn-success">
                                                <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;加入购物车
                                            </button>
                                        </a>
                                    @endif
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <ul class="pager">
                        {{--<li>1 through 21</li>--}}
                        {{--<li><a href="/">下一页</a></li>--}}
                    </ul>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div id="slidebox">
                <a class="close"></a>

                <h2>Build the skills needed to launch &amp; grow startups</h2>
                <a href="courses/" class="btn btn-danger" style="text-align:center;">VIEW COURSES »</a>
            </div>
        </div>
    </div>
    <div class="section-footer">
        <div class="container">
            <footer id="footer">
            </footer>
        </div>
    </div>
@endsection
