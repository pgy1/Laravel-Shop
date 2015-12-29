@extends('app')

@section('content')


    <div class="section-preview">
        <div class="container">
            {{--<div class="row" style="margin-bottom:20px;margin-left:0px;"><p><span class="group_day"><i--}}
                                {{--class="fa fa-star" style="color:#f39c12;"></i> 活动区>></span>--}}
                {{--</p></div>--}}
            <div class="row">

                <ul class="list-group">
                <li class="list-group-item  list-group-item-success">活动区</li>
                @foreach($events as $key=>$event)
                <li class="list-group-item">
                    <span class="badge">14</span>
                    {{ $event->title }}
                  </li>
                @endforeach
                </ul>

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
