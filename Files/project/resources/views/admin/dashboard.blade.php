@extends('admin.includes.masterpage-admin')

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
                                        <a href="{{url('admin/auction')}}" class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-gavel fa-5x"></i></div>
                                            <div class="number">{{ \App\Auction::count() }}</div>
                                            <h4>Total Auctions!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/auction')}}" class="title-stats title-green">
                                            <div class="icon"><i class="fa fa-gamepad fa-5x"></i></div>
                                            <div class="number">{{ \App\Auction::where('status','open')->count() }}</div>
                                            <h4>Auction Running!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/withdraws/pending')}}" class="title-stats title-purple">
                                            <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                            <div class="number">{{ \App\Withdraw::where('status','pending')->count() }}</div>
                                            <h4>Pending Withdraws!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/users')}}" class="title-stats title-skyblue">
                                            <div class="icon"><i class="fa fa-user fa-5x"></i></div>
                                            <div class="number">{{ \App\UserProfile::count() }}</div>
                                            <h4>Total Users!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/portfolio')}}" class="title-stats title-red">
                                            <div class="icon"><i class="fa fa-file-image-o fa-5x"></i></div>
                                            <div class="number">{{ \App\Portfolio::count() }}</div>
                                            <h4>Gallery Images!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/ads')}}" class="title-stats title-yellow">
                                            <div class="icon"><i class="fa fa-link fa-5x"></i></div>
                                            <div class="number">{{ \App\Advertisement::count() }}</div>
                                            <h4>Total Ads!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('admin/subscribers')}}" class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-group fa-5x"></i></div>
                                            <div class="number">{{ \App\Subscribers::count() }}</div>
                                            <h4>Total Subscribers!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference + Most Used OS area -->
                    <div class="reference-OS-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">Top Referrals</div>
                                    <div class="panel-body">
                                        <div id="chartContainer-topReference"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">Most Used OS</div>
                                    <div class="panel-body">
                                        <div id="chartContainer-os"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Top reference + Most Used OS area -->

                    <!-- Starting of Dashboard product-sold-chart area -->
                    {{--<div class="product-sold-chart">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-12 col-md-12">--}}
                                {{--<div id="chartContainer"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!-- Ending of Dashboard product-sold-chart area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
<script>

    jQuery(window).load(function(){
        var options = {
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "Porducts Sold in Last 30 Days",
                horizontalAlign: "left",
                padding: {
                    top: 20,
                    bottom: 20,
                    left: 20
                }
            },
            data: [
                {
                    type: "splineArea", //change it to line, area, bar, pie, etc
                    dataPoints: [
                        { y: 10 },
                        { y: 6 },
                        { y: 14 },
                        { y: 12 },
                        { y: 19 },
                        { y: 14 },
                        { y: 26 },
                        { y: 10 },
                        { y: 22 }
                    ]
                }
            ]
        };
        //$("#chartContainer").CanvasJSChart(options);

        // Pie chart topReference
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,
                // title:{
                //     text: "Pie Chart",
                //     horizontalAlign: "left",
                //     padding: {
                //         top: 20,
                //         bottom: 2,
                //         left: 20
                //         },
                // },
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20
                    }
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{y} </strong>(#percent%)",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($referrals as $browser)
                                    {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                                @endforeach
                        ]
                    }
                ]
            });
        chart1.render();


        // Pie chart OS
        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                // title:{
                //     text: "Pie Chart",
                //     horizontalAlign: "left",
                //     padding: {
                //         top: 20,
                //         bottom: 2,
                //         left: 20
                //         },
                // },
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20
                    }
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{y} </strong>(#percent%)",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($browsers as $browser)
                                    {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                                @endforeach
                        ]
                    }
                ]
            });
        chart.render();


    });
</script>
@stop