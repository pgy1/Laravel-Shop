@extends('app')

@section('content')

    <div class="section-preview">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 col-sm-4 text-center">
                    <p>{{ $msg }}</p>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row">
                @if(sizeof($data['favorites'])>0)

                    <div class="panel panel-default">
                        <!-- Default panel contents -->

                        <div class="panel-heading clearfix">
                            <div class="fleft">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 购物车
                            </div>
                            <a href="{{ url("favorite/clear") }}" class="fright">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 清空购物车
                            </a>
                        </div>

                        <!-- Table -->
                        <table class="table">
                            @foreach($data['favorites'] as $key=>$favorite)
                                @foreach($data['products'][$favorite->fid] as $key=>$product)
                            <tr>
                                <td width="20%">
                                    <img src="{{ url($product->images)  }}" class="img-thumbnail fleft" width="150">
                                </td>
                                <td width="70%">
                                    <div>
                                        <h4 class="list-group-item-heading">
                                            <a href="{{ url('product/show').'/'.$product->pid  }}">{{ $product->name }}</a>
                                        </h4>
                                        <p class="list-group-item-text">{{ htmlspecialchars_decode($product->description) }}</p>
                                    </div>
                                </td>
                                <td width="10%">
                                    <a class="btn btn-danger fleft" href="{{ url('/past/create').'/'.$product->pid }}">
                                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 支付
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                    <a class="btn btn-warning fleft" href="{{ url('/favorite/delete').'/'.$favorite->fid }}">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 删除
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 col-sm-4 text-center">
                        <p>购物车没有商品，快去<a href="{{ url('/home') }}">shopping</a>吧</p>
                    </div>
                    <div class="col-lg-4"></div>
                @endif
            </div>


            @if($data['page']['total'] > 5)
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <ul class="pager">
                            @if(!empty($data['page']['last']))
                            <li class="last"><a href="{{ url('/favorite/list').'/'.$data['page']['last'] }}">上一页 →</a></li>
                            @endif
                            @if(!empty($data['page']['next']))
                            <li class="next"><a href="{{ url('/favorite/list').'/'.$data['page']['next'] }}">下一页 →</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            @endif
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
