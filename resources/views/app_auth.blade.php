<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>二手物品发布平台</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('uploadcss')
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}"/>

</head>
<body>

<div class="navbar navbar-default navbar-fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand"><span style="font-weight:300;">二手物品发布平台</span></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页</a></li>
                    <li class="dropdown">
                        <a href="{{ url('/product/list') }}" class="dropdown-toggle" data-hover="dropdown" data-delay="300" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;商品分类</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/product/list/1') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;电子产品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/2') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;生活用品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/3') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;体育用品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/4') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;专业书籍
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/5') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;其他用品
                                </a>
                            </li>
                        </ul>
                    </li>
                <li><a href="{{ url('/favorite/list') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;购物车</a></li>
                @else
                <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页</a></li>
                    <li class="dropdown">
                        <a href="{{ url('/product/list') }}" class="dropdown-toggle" data-hover="dropdown" data-delay="300" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;商品分类</a>
                        <ul class="dropdown-menu dropdown-menu-type">
                            <li>
                                <a href="{{ url('/product/list/1') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;电子产品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/2') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;生活用品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/3') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;体育用品
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/4') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;专业书籍
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/product/list/5') }}">
                                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;其他用品
                                </a>
                            </li>
                        </ul>
                    </li>
                <li><a href="{{ url('/favorite/list') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;购物车</a></li>
                <li><a href="{{ url('/past/list') }}"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;待处理订单</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">登录</a></li>
                    <li><a href="{{ url('/auth/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;{{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/userinfo/edit') }}">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;个人资料
                                </a>
                            </li>
                            <li><a href="{{ url('/product/edit') }}">
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;&nbsp;发布商品
                                </a>
                            </li>
                            <li><a href="{{ url('/past/list') }}">
                                    <span class="glyphicon glyphicon-align-right" aria-hidden="true"></span>&nbsp;&nbsp;历史订单
                                </a>
                            </li>
                            <li><a href="{{ url('/auth/logout') }}">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;退出登录
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div id="mc_embed_signup" style="padding: 7px 0;">
                <form action="{{ url('/product/search') }}" method="get" id="mc-embedded-subscribe-form"
                      class="validate">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-append">
                        <input type="text" value="" name="search" class="form-control" id="mce-EMAIL"
                               placeholder="物品搜索" required
                               style="width:250px;font-size:15px;margin-left: 40px;height:35px;color: #555;border: 1px solid #ccc;border-radius: 4px;display:inline-block; ">

                        <input type="submit" value="搜索" id="mc-embedded-subscribe"
                               class="btn btn-default" style="background-color: #fd5443;height: 34px;font-size: 15px;color: #fff;border:0;display: inline-block;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@yield('content')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>--}}
{{--<script src="{{ url('js/jquery.min.js') }}"></script>--}}
<script src="{{ url('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ url('js/bootstrap-hover-dropdown.min.js') }}"></script>--}}
<script src="{{ url('js/custom.js') }}"></script>
@yield('uploadify')
</body>
</html>
