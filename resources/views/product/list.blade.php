@extends('app')

@section('content')

    <div class="section-preview">
        <div class="container">
            <div class="row" style="margin-bottom:20px;margin-left:0px;">
                <p>
                    <span class="group_day"><i class="fa fa-star" style="color:#f39c12;"></i> Newest</span>
                    <span class="group_date">Startups</span>
                </p>
            </div>
            <div class="row">

                @foreach($data['products'] as $key=>$product)
                <div class="col-lg-4 col-sm-6">
                    <div class="preview">
                        <div class="image">
                            <img src="{{ url($product->images)  }}" width="360">
                        </div>
                        <div class="options">
                            <h3>{{ $product->name }}</h3>

                            <p>{{ htmlspecialchars_decode($product->description) }}</p>

                            <div class="btn-group"><a class="btn btn-info" href="s/seat77/16261/">More Info</a></div>
                            <div class="btn-group"><a class="btn btn-success" href="http://www.seat77.com"
                                                      target="_blank" rel="nofollow"
                                                      onclick="_gaq.push(['_trackEvent', 'Click', 'seat77']);">Visit
                                    &nbsp;&nbsp;<i class="fa fa-external-link"></i></a></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <ul class="pager">
                        <li>1 through 21</li>
                        <li class="next"><a href="21/">Next →</a></li>
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
