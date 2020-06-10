@extends('user.includes.masterpage-user')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard header items area -->
                    <div class="panel panel-default admin">
                        <div class="panel-heading admin-title">Admin Dashboard!</div>
                        <div class="panel-body dashboard-body">
                            <div class="dashboard-header-area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('user/withdrawform')}}" class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                            <div>{{$settings[0]->currency_sign}}<span class="number">{{round(Auth::user()->acc_balance,2)}}</span></div>
                                            <h4>Current Balance!</h4>
                                            <span class="title-view-btn">Withdraw Now</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('user/auction')}}" class="title-stats title-green">
                                            <div class="icon"><i class="fa fa-gavel fa-5x"></i></div>
                                            <div class="number">{{ \App\Auction::where('createdby',$user->id)->count() }}</div>
                                            <h4>My Auctions!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('user/mybids')}}" class="title-stats title-gray">
                                            <div class="icon"><i class="fa fa-check-circle fa-5x"></i></div>
                                            <div class="number">{{ \App\Bid::where('bidder',$user->id)->count() }}</div>
                                            <h4>My Bids!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard header items area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop