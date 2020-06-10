@extends('includes.masterpage')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$pagename}}</h1>
                </div>
            </div>

        </div>
    </section>



    <!-- Starting of Featured Auction area -->
    <div class="section-padding all-blogs-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                @foreach($auctions as $auction)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/')}}/auction/{{$auction->id}}" class="single-featured-item">
                            <div class="featured-img">
                                <img class="featured-img" src="{{url('/assets/images/auction')}}/{{$auction->feature_image}}" alt="">
                            </div>

                            <div class="featured-text">
                                <div class="featured-meta">
                                    <span class="featured-left">{{$settings[0]->currency_sign}}{{$auction->price}}</span>
                                    <span>{{$language->highest_bid}}  <strong class="featured-left">{{$settings[0]->currency_sign}}{{\App\Bid::maxBid($auction->id)}}</strong></span>
                                </div>
                                <h4>{{$auction->title}}</h4>
                                <ul>
                                    <li><span>{{\App\Bid::countBid($auction->id)}}</span> {{$language->bids}}</li>
                                    <li><span>{{$auction->condition}}</span> {{$language->conditions}}</li>
                                    <li><span>
                                            @if (((strtotime($auction->end_date)-time())/86400) < 0)
                                                <b>{{0}}</b>
                                            @else
                                                <b>{{ceil((strtotime($auction->end_date)-time())/86400)}}</b>
                                            @endif
                                        </span>
                                        {{$language->days_left}}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of Featured Auction area -->



    {{--<div id="wrapper" class="go-section">--}}
        {{--<div class="row">--}}
            {{--<div class="container">--}}
                {{--<div id="allcamps">--}}
                    {{--@forelse($auctions as $auction)--}}
                        {{--<div class="col-xs-12 col-sm-6 col-md-4">--}}
                            {{--<div class="package-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
                                {{--<a href="{{url('/')}}/auction/{{$auction->id}}">--}}
                                    {{--<div class="package-thumb">--}}
                                        {{--<img width="800" height="570" src="{{url('/assets/images/auction')}}/{{$auction->feature_image}}" class="" alt="1">--}}
                                    {{--</div>--}}
                                    {{--<div class="package-info text-center">--}}

                                        {{--<h4 class="">${{$auction->price}}</h4>--}}
                                        {{--<h3>{{$auction->title}}</h3>--}}
                                        {{--<h4 class="">Highest Bid: {{\App\Bid::maxBid($auction->id)}}</h4>--}}

                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4 small-box">--}}
                                                {{--<b>{{\App\Bid::countBid($auction->id)}}</b>--}}
                                                {{--<span>Bids</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4 small-box">--}}
                                                {{--<b>{{$auction->condition}}</b>--}}
                                                {{--<span>Condition</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4 small-box">--}}
                                                {{--@if (((strtotime($auction->end_date)-time())/86400) < 0)--}}
                                                    {{--<b>{{0}}</b>--}}
                                                {{--@else--}}
                                                    {{--<b>{{ceil((strtotime($auction->end_date)-time())/86400)}}</b>--}}
                                                {{--@endif--}}
                                                {{--<span>Days Left</span>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@empty--}}
                        {{--<div class="col-md-12">--}}
                            {{--<h4>No Featured Auctions Found.</h4>--}}
                        {{--</div>--}}
                    {{--@endforelse--}}
                    {{--<div class='col-md-12 margintop'></div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop

@section('footer')

@stop