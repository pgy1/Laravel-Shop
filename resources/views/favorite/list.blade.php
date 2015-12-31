@extends('app')

@section('content')

    <div class="section-preview">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 col-sm-4 text-center">
                    {{--<p>{{ $msg }}</p>--}}
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row">
                {{--{{ dd($data) }}--}}
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
                                <td><input type="checkbox" name="check" class="check" /></td>
                                <td width="20%">
                                    <img src="{{ url($product->image)  }}" class=" fleft" width="150" height="150">
                                </td>
                                <td width="70%">
                                    <div>
                                        <h4 class="list-group-item-heading">
                                            <a href="{{ url('product/show').'/'.$product->pid  }}">{{ $product->name }}</a>
                                            <span class="red">￥<span class="price">{{ $product->price }}</span></span>
                                        </h4>
                                        <p class="list-group-item-text">{{ htmlspecialchars_decode($product->description) }}</p>

                                    </div>
                                </td>
                                <td width="10%">
                                    <div class="operate hidden">
                                        <a class="btn btn-warning fleft" href="{{ url('/favorite/delete').'/'.$favorite->fid }}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 删除
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                                @endforeach
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <input type="checkbox" name="check" class="checkall" />&nbsp;&nbsp;全选
                                </td>
                                <td>
                                    <div class="clearfix">
                                        <p class="fleft" style="font-size: 20px;">共：<span class="sum red">￥{{ $data['sum'] }}</span></p>
                                        <a class="btn btn-danger fright" href="http://localhost:8001/laravel/public/past/create/145136053832813">
                                            ￥结算
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
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

@section('car')
    <script>
        $(".check").each(function (index, ele) {
            $(ele).bind("click",function(){
                $(ele).parent().siblings("td:last").find(".operate").addClass("hidden");
                if($(ele).is(":checked")){
                    $(ele).parent().siblings("td:last").find(".operate").removeClass("hidden");
                }
            });
        });
    </script>
@endsection