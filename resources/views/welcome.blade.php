@extends('app')

@section('content')

    <div class="splash">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Searching for anything you want</h1>

                    <div id="mc_embed_signup">
                        <form action="{{ url('/home') }}" method="get" id="mc-embedded-subscribe-form"
                              class="validate">
                            <label for="mce-EMAIL" style="padding-bottom:4px;">Get the best new product!</label>
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                            <div class="input-append">
                                <input type="text" value="" name="search" class="form-control" id="mce-EMAIL"
                                       placeholder="物品搜索" required
                                       style="width:250px;float:center;font-size:15px;height:43px;color: #555;border: 1px solid #ccc;border-radius: 4px;padding: 0px 0px 0px 10px;	display:inline-block; ">

                                <input type="submit" value="搜索" id="mc-embedded-subscribe"
                                       class="btn btn-default" style="background-color: #fd5443;height: 40px;font-size: 15px;color: #fff;border:0;display: inline-block;">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="section-preview">
        <div class="container">
            <div class="row" style="margin-bottom:20px;margin-left:0px;"><p><span class="group_day"><i
                                class="fa fa-star" style="color:#f39c12;"></i> 文章</span> <span class="group_date">展示</span>
                </p></div>
            <div class="row">

                @foreach($articles as $key=>$article)
                <div class="col-lg-4 col-sm-6">
                    <div class="preview">
                        <div class="image">
                            <img src="{{ url('/images/product').'/'.$article->img }}" width="350">
                        </div>
                        <div class="options">
                            <h3>{{ $article->name }}</h3>

{{--                            <p>{{ strip_tags($article->content) }}</p>--}}

                            <div class="btn-group"><a class="btn btn-info" target="_blank" href="{{ url('/single').'/'.$article->id }}">查看详情</a></div>
                        </div>
                    </div>
                </div>
                @endforeach

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
