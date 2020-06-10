@extends('includes.masterpage')

@section('content')

<!-- Starting of Auctions bid area -->
<div class="section-padding auctions-bid-header-section overlay text-center wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});">
    <div class="container">
        <div class="row">
            <h1>{{$auction->title}}</h1>
        </div>
    </div>
</div>
<!-- Ending of Auctions bid area -->

<!-- Starting of Auctions bid amount area -->
<div class="auction-bid-area wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="auction-left-content">
                    <div class="auction-bid-carousel-area">
                        <div id="gallery" style="display:none;">
                            <img alt="Image 1 Title" src="{{url('/assets/images/auction/'.$auction->feature_image)}}"
                                 data-image="{{url('/assets/images/auction/'.$auction->feature_image)}}"
                                 data-description="Image 1 Description">
                            @foreach($gallerys as $gallery)
                                <img alt="Image 2 Title" src="{{url('/assets/images/gallery/'.$gallery->image)}}"
                                     data-image="{{url('/assets/images/gallery/'.$gallery->image)}}"
                                     data-description="Image 2 Description">
                            @endforeach
                        </div>
                    </div>
                    <div class="auction-bid-ad-area">
                        @if(!empty($ads728x90))
                            @if($ads728x90->type == "banner")
                                <a class="ads" href="{{$ads728x90->redirect_url}}" target="_blank">
                                    <img class="banner-728x90" src="{{url('/')}}/assets/images/ads/{{$ads728x90->banner_file}}" alt="Advertisement">
                                </a>
                            @else
                                {!! $ads728x90->script !!}
                            @endif
                        @endif
                    </div>
                    <div class="auction-bid-description-area">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#bidHistory">Bid History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active">
                                <p>{!! $auction->description !!}</p>
                            </div>
                            <div id="bidHistory" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="auction-table" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>Bid Amount</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse($bids as $bid)
                                            <tr>
                                                <td>{{$bid->bidder->name}}</td>
                                                <td>${{$bid->bid_amount}}</td>
                                                <td>{{$bid->created_at}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">No Bid Placed Yet.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="auction-bid-ad-area">
                            @if(!empty($ads728x90))
                                @if($ads728x90->type == "banner")
                                    <a class="ads" href="{{$ads728x90->redirect_url}}" target="_blank">
                                        <img class="banner-728x90" src="{{url('/')}}/assets/images/ads/{{$ads728x90->banner_file}}" alt="Advertisement">
                                    </a>
                                @else
                                    {!! $ads728x90->script !!}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="auction-bid-rightside">
                    <div class="auction-bid-intro">
                        <div class="auction-bid-singleintro">
                            <p><strong>{{$language->created_by}}:</strong></p>
                            <p>{{$auction->createdby->name}}</p>
                        </div>
                        <div class="auction-bid-singleintro">
                            <p><strong>{{$language->conditions}}:</strong></p>
                            <p>{{$auction->condition}}</p>
                        </div>
                        <div class="auction-bid-singleintro">
                            <p><strong>{{$language->highest_bid}}:</strong></p>
                            <p>{{$settings[0]->currency_sign}}{{\App\Bid::maxBid($auction->id)}}</p>
                        </div>
                        <div class="auction-bid-singleintro">
                            <p><strong>{{$language->buy_now}}:</strong></p>
                            <p>{{$settings[0]->currency_sign}}{{$auction->price}}</p>
                        </div>
                    </div>

                    <div class="auction-bid-limit text-center">
                        <p>
                            <i class="fa fa-clock-o"></i>
                            <span>
                                @if (((strtotime($auction->end_date)-time())/86400) < 0)
                                    <b>{{0}}</b>
                                @else
                                    <b>{{ceil((strtotime($auction->end_date)-time())/86400)}}</b>
                                @endif
                                    {{$language->days_left}}
                            </span>
                        </p>
                        <p><i class="fa fa-gavel"></i> <span>{{\App\Bid::countBid($auction->id)}} {{$language->bids}}</span></p>
                    </div>


                    <div class="social-sharing text-center">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_40 a2a_default_style">
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_google_plus"></a>
                            <a class="a2a_button_linkedin"></a>
                            <a class="a2a_dd" href="https://www.geniusocean.com"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>

                    <div class="auction-form-area">
                        <form action="{{action('FrontEndController@bid' , ['id'=>$auction->id])}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="bid-amount">{{$language->amount}}({{$settings[0]->currency_code}}):</label>
                                <input type="text" id="bid-amount" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                       title="Price must be a numeric or up to 2 decimal places." name="amount" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-12">

                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                @if($auction->status != "open")
                                    <button class="btn btn-block btn-primary" type="submit" disabled="disabled">Place Bid Now</button>
                                @else
                                    <button class="btn btn-block btn-primary" type="submit">Place Bid Now</button>
                                @endif

                            </div>

                            <div class="form-group">
                                @if(str_replace('$','',\App\Bid::maxBid($auction->id)) < $auction->price)
                                    @if($auction->status != "open")
                                        <a href="javascript:;"><button class="btn btn-block btn-warning" type="submit" disabled>Buy Now</button></a>
                                    @else
                                        <a href="{{url('/auction/'.$auction->id.'/buy')}}"><button class="btn btn-block btn-warning" type="submit">Buy Now</button></a>
                                    @endif
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="auction-recent-bid-area">
                        <hr>
                        <h2>Recent Bids</h2>
                        <hr>

                        <div class="auction-recent-bid-limit">
                            @forelse($recentbids as $recentbid)
                                <p><span class="bid-amount">{{$settings[0]->currency_sign}} {{$recentbid->bid_amount}}</span></p>
                                <p><i class="fa fa-gavel"></i> <span>{{$recentbid->bidder->name}} - {{$recentbid->updated_at->diffForHumans()}}</span></p>
                            @empty
                                <p>No Bid Placed Yet.</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ending of Auctions bid amount area -->

<!-- Starting of Related Auctions area -->
<div class="blog-area-wrapper related-auctions padding-top-0 wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <h2>Related Auctions</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel blog-area-slider">
                    @foreach($popauctions as $auction)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ending of Related Auctions area -->


@stop

@section('footer')
<script>

    jQuery("#gallery").unitegallery({
        gallery_theme: "compact",
        gallery_autoplay: false,						//true / false - begin slideshow autoplay on start
        gallery_play_interval: 3000,				//play interval of the slideshow
        slider_scale_mode: "fit",
        slider_enable_play_button: false,	//show, hide the theme fullscreen button. The position in the theme is constant
        slider_enable_fullscreen_button: false			//show, hide the theme play button. The position in the theme is constant
    });



</script>
@stop