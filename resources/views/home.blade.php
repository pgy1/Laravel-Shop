@extends('app_auth')

@section('content')

    <div class="splash">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h1>寻找你的"珍"爱</h1>

                    {{--<div id="mc_embed_signup">--}}
                        {{--<form action="{{ url('/product/search') }}" method="get" id="mc-embedded-subscribe-form"--}}
                              {{--class="validate">--}}
                            {{--<label for="mce-EMAIL" style="padding-bottom:4px;">Get the best new product!</label>--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                            {{--<div class="input-append">--}}
                                {{--<input type="text" value="" name="search" class="form-control" id="mce-EMAIL"--}}
                                       {{--placeholder="物品搜索" required--}}
                                       {{--style="width:250px;float:center;font-size:15px;height:43px;color: #555;border: 1px solid #ccc;border-radius: 4px;padding: 0px 0px 0px 10px;	display:inline-block; ">--}}

                                {{--<input type="submit" value="搜索" id="mc-embedded-subscribe"--}}
                                       {{--class="btn btn-default" style="background-color: #fd5443;height: 40px;font-size: 15px;color: #fff;border:0;display: inline-block;">--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>
    </div>
    <div class="section-preview">
        <div class="container">
            <div class="row">
                @if(sizeof($products)>0)
                @foreach($products as $key=>$product)
                <div class="col-lg-4 col-sm-6">
                    <div class="preview">
                        <div class="image positive">
                            <img src="{{ url($product->images) }}" width="360">

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
                                <a href="{{ url('/product/show').'/'.$product->id }}">
                                    <button class="btn btn-info">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;查看详情
                                    </button>
                                </a>
                                <a href="{{ url('/favorite/create').'/'.$product->id }}">
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;收藏物品
                                    </button>
                                </a>
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
