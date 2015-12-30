@extends('app')

@section('content')

    <div class="section-preview">
        <div class="container">
            <div class="row" style="margin-bottom:20px;margin-left:0px;">
                <p>
                    <span class="group_day"><i class="fa fa-star" style="color:#f39c12;"></i> 搜索结果&gt;&gt;</span>
                    <span class="group_date">{{ $search }}</span>
                </p>
            </div>
            <div class="row">
                @foreach($products['data'] as $key=>$product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="preview">
                            <div class="image">
                                <img src="{{ url($product['image'])  }}" width="360" height="250">
                            </div>
                            <div class="options">
                                <h3>{{ $product['name'] }}</h3>

                                <p>价格：<span style="color:red;">￥{{ $product['price'] }}</span></p>
                                <p>交易方式：{{ $product['payway'] }}</p>

                                <div class="btn-group">
                                    <a href="{{ url('/product/show').'/'.$product["pid"] }}">
                                        <button class="btn btn-info">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;查看详情
                                        </button>
                                    </a>
                                    @if(Auth::check())
                                        @if(isset($product->fid))
                                            <a href="{{ url('/favorite/cancel').'/'.$product->pid }}">
                                                <button class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;已收藏
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ url('/favorite/create').'/'.$product->pid }}">
                                                <button class="btn btn-success">
                                                    <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;收藏物品
                                                </button>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <ul class="pager">
                        {{--{{ dd($pages) }}--}}
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
