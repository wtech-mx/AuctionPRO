@extends('includes.masterpage')
@section('content')

    @if($pagesettings[0]->slider_status)
    <!-- Starting of Slider area -->
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000">

        <!-- Indicators -->
    {{--<ol class="carousel-indicators">--}}
    {{--@for ($i = 0; $i < count($sliders); $i++)--}}
    {{--@if($i == 0)--}}
    {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}" class="active"></li>--}}
    {{--@else--}}
    {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}"></li>--}}
    {{--@endif--}}
    {{--@endfor--}}
    {{--</ol>--}}

    <!-- Wrapper For Slides -->
        <div class="carousel-inner" role="listbox">

        @for ($i = 0; $i < count($sliders); $i++)
            @if($i == 0)
                <!-- Third Slide -->
                    <div class="item active">

                        <!-- Slide Background -->
                        <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text {{$sliders[$i]->text_position}}">

                                    <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                    <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
            @else
                <!-- Second Slide -->
                    <div class="item">

                        <!-- Slide Background -->
                        <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>
                        <!-- Slide Text Layer -->
                        <div class="slide-text {{$sliders[$i]->text_position}}">
                            <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                            <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                        </div>
                    </div>
                    <!-- End of Slide -->
                @endif
            @endfor


        </div><!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <!-- Ending of Slider area -->
    @endif

    @if($pagesettings[0]->split_status)
    <!-- Starting of service area -->
    <div class="section-padding charity-service-area-wrapper">
        <div class="container">
            <div class="row">
                @foreach($splits as $split)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-charity-service-area">
                            <i class="fa {{$split->icon}}"></i>
                            <h3>{{$split->title}}</h3>
                            <p>{!! $split->text !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of service area -->
    @endif

    @if($pagesettings[0]->welcome_status)
        <!-- Starting of help fund area -->
        <div class="section-padding helping-fund-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <img src="{{url('/assets/images/')}}/{{$pagesettings[0]->welcome_image}}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>{{$pagesettings[0]->welcome_title}}</h1>
                        <p>{{$pagesettings[0]->welcome_description}}</p>
                        @if($pagesettings[0]->w_b_status == 1)
                            <a href="{{$pagesettings[0]->welcome_link}}" class="boxed-btn">{{$language->view_details}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of help fund area -->
    @endif

    @if($pagesettings[0]->service_status)
        <!-- Starting of service area -->
        <div class="section-padding service-area-wrapper overlay wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->service_title}}</h2>
                            <p>{{$languages->service_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-4 col-sm-6">
                            <div class="single-service-box">
                                <div class="service-icon">
                                    <img src="{{url('/assets/images/service')}}/{{$service->icon}}" alt="Service Image">
                                </div>
                                <div class="service-text">
                                    <h3>{{$service->title}}</h3>
                                    <p>{{$service->text}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Ending of service area -->
    @endif

    @if($pagesettings[0]->category_status)
        <!-- Starting of Campaign Categories area -->
        <div class="section-padding campaign-categories-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->category_title}}</h2>
                            <p>{{$languages->category_text}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="single-campaignCategories-area">
                                <img src="{{url('/assets/images/category')}}/{{$category->image}}" alt="">
                                <a href="category/{{$category->slug}}" class="single-campaignCategories-header">
                                    <h3>{{$category->name}}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Ending of Campaign Categories area -->
    @endif

    @if($pagesettings[0]->featured_status)
    <!-- Starting of Featured Auction area -->
    <div class="section-padding featured-auction-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->pricing_title}}</h2>
                        <p>{{$languages->pricing_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel featured-list">
                        @foreach($fauctions as $auction)
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
    <!-- Ending of Featured Auction area -->
    @endif

    @if($pagesettings[0]->latest_status)
    <!-- Starting of Latest Auction area -->
    <div class="section-padding blog-area-wrapper padding-top-0 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->newcamp_title}}</h2>
                        <p>{{$languages->newcamp_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel blog-area-slider">
                        @foreach($newauctions as $auction)
                            <a href="{{url('/')}}/auction/{{$auction->id}}" class="single-featured-item">
                                <div class="featured-img">
                                    <img class="featured-img" src="{{url('/assets/images/auction')}}/{{$auction->feature_image}}" alt="">
                                </div>

                                <div class="featured-text">
                                    <div class="featured-meta">
                                        <span class="featured-left">{{$settings[0]->currency_sign}}{{$auction->price}}</span>
                                        <span>{{$language->highest_bid}}  <strong class="featured-left">{{$settings[0]->currency_sign}}{{\App\Bid::maxBid($auction->id)}}	
                                        </strong></span>
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
    <!-- Ending of Latest Auction area -->
    @endif

    @if($pagesettings[0]->portfolio_status)
        <!-- Starting of Gallery area -->
        <div class="section-padding gallery-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->portfolio_title}}</h2>
                            <p>{{$languages->portfolio_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="row gallery-list">
                    @foreach($portfilos as $portfilo)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-gallery-item">
                                <img src="{{url('/assets/images/portfolio')}}/{{$portfilo->image}}" alt="Gallery image">
                                <div class="gallery-overlay"></div>
                                <div class="gallery-icons">
                                    <a class="image-popup" href="{{url('/assets/images/portfolio')}}/{{$portfilo->image}}">
                                        <i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Ending of Gallery area -->
    @endif

    @if($pagesettings[0]->testimonial_status)
        <!-- Starting of carousel testimonial area -->
        <div class="section-padding home-testimonial-wrapper overlay wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->testimonial_title}}</h2>
                            <p>{{$languages->testimonial_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="owl-carousel testimonial-section animated fadeInRight">
                            @foreach($testimonials as $testimonial)
                                <div class="single-testimonial-area">
                                    <div class="testimonial-text">
                                        <p class="ctext">{{$testimonial->review}}</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="{{url('/assets/images')}}/testimonial-author-1.png" alt="Author">
                                        <h4><strong>{{$testimonial->client}}</strong> <br> {{$testimonial->designation}}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of carousel testimonial area -->
    @endif

    @if($pagesettings[0]->blog_status)
        <!-- Starting of blog area -->
        <div class="section-padding blog-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->blog_title}}</h2>
                            <p>{{$languages->blog_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-area-slider">
                            @foreach($blogs as $blog)

                                <a href="{{url('/blog')}}/{{$blog->id}}" class="single-blog-box">
                                    <div class="blog-thumb-wrapper">
                                        <img src="{{url('/assets/images/blog')}}/{{$blog->featured_image}}" alt="Blog Image">
                                    </div>
                                    <div class="blog-text">
                                        <p class="blog-meta">{{date('d M Y',strtotime($blog->created_at))}}</p>
                                        <h4>{{$blog->title}}</h4>
                                        <p class="blog-meta-text">{{substr(strip_tags($blog->details),0,125)}}</p>
                                        <span class="boxed-btn">{{$language->view_details}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of blog area -->
    @endif


    @if($pagesettings[0]->counter_status)
    <!-- Starting of counterUp area -->
    <div class="counter-padding counter-up-section overlay text-center wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});">
        <div class="container">
            <div class="row">
                <div class="conuter-up-textArea">
                    <div class="col-md-4 col-sm-4">
                        <div class="single-counter-box">
                            <h2 class="counter-number">{{\App\Auction::where('status','open')->count()}}</h2>
                            <p>{{$language->running_auctions}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="single-counter-box">
                            <h2 class="counter-number">{{\App\Bid::count()}}</h2>
                            <p>{{$language->total}} {{$language->bids}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="single-counter-box">
                            <h2 class="counter-number">{{\App\Auction::where('status','closed')->count()}}</h2>
                            <p>{{$language->completed_auctions}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of counterUp area -->
    @endif

    @if($pagesettings[0]->home_reg_status)
    <!-- Starting of Volunteer registration area -->
    <div class="section-padding volunteer-registration-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{url('/')}}/assets/images/auction-property.jpg" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default volunteer-registration">
                        <div class="panel-heading">{{$language->sign_up}}</div>
                        <div class="panel-body">
                            <form action="{{route('user.reg.submit')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div id="resp">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>* {{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>* {{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn boxed-btn register">{{$language->sign_up}}</button>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{route('user.login')}}">Already have an account? Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Volunteer registration area -->
    @endif

@stop

@section('footer')
<script>

</script>
@stop