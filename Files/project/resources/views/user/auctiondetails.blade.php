@extends('user.includes.masterpage-user')

@section('content')



    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard view auction details area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header campaigns">
                                        <h2>Auction Details</h2>
                                        <a href="{!! url('user/auction') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>

                                    <div class="campaign-tab">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#campaignDetails">Auction Details</a></li>
                                            <li><a data-toggle="tab" href="#donations">Bid Information</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="campaignDetails" class="tab-pane fade in active">
                                                <h3>{{$auction->title}}</h3>

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td width="30%"><strong>Auction ID#</strong></td>
                                                            <td>{{$auction->id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Auction Status:</strong></td>
                                                            <td>{{ucfirst($auction->status)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Listing Type:</strong></td>
                                                            <td>
                                                                @if($auction->featured == 1)
                                                                    <label class="label label-primary">Featured</label>
                                                                @else
                                                                    <label class="label label-default">Basic</label>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        @if($auction->winner != "")
                                                            <tr class="success">
                                                                <td width="30%"><strong> Winner: </strong></td>
                                                                <td>{{\App\Bid::findOrFail($auction->winner)->bidder->name}}</td>
                                                            </tr>
                                                            <tr class="success">
                                                                <td width="30%"><strong> Winning Amount: </strong></td>
                                                                <td>${{\App\Bid::findOrFail($auction->winner)->bid_amount}}</td>
                                                            </tr>
                                                            <tr class="success">
                                                                <td width="30%"><strong> Shipping </strong></td>
                                                                <td>
                                                                    @if(\App\Transaction::where('auctionid',$auction->id)->where('userid',\App\Bid::findOrFail($auction->winner)->bidder->id)->where('reason','buy')->where('payment_status','Completed')->count() > 0)
                                                                        <strong>Address:</strong> {{\App\Transaction::where('auctionid',$auction->id)->where('userid',\App\Bid::findOrFail($auction->winner)->bidder->id)->where('reason','buy')->where('payment_status','Completed')->first()->address}}<br>
                                                                        <strong>City:</strong> {{\App\Transaction::where('auctionid',$auction->id)->where('userid',\App\Bid::findOrFail($auction->winner)->bidder->id)->where('reason','buy')->where('payment_status','Completed')->first()->city}}<br>
                                                                        <strong>Zip:</strong> {{\App\Transaction::where('auctionid',$auction->id)->where('userid',\App\Bid::findOrFail($auction->winner)->bidder->id)->where('reason','buy')->where('payment_status','Completed')->first()->zip}}<br>
                                                                    @else
                                                                        <label class="label label-danger">Unpaid</label>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        <tr>
                                                            <td width="30%"><strong>Created On:</strong></td>
                                                            <td>{{date('Y-m-d h:i:sa',strtotime($auction->created_at))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>End Date:</strong></td>
                                                            <td>{{date('Y-m-d h:i:sa',strtotime($auction->end_date))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Created By:</strong></td>
                                                            <td>{{$auction->createdby->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Auction Title:</strong></td>
                                                            <td>{{$auction->title}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Auction Category:</strong></td>
                                                            <td>{{$auction->category}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Item Condition:</strong></td>
                                                            <td>{{$auction->condition}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td width="30%"><strong>Buy Now Price:</strong></td>
                                                            <td>${{$auction->price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Auction Start Amount:</strong></td>
                                                            <td>${{$auction->start_amount}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Feature Image:</strong></td>
                                                            <td><img style="max-width: 300px;" src="{{url('assets/images/auction')}}/{{$auction->feature_image}}" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><strong>Auction Description:</strong></td>
                                                            <td>{!! $auction->description !!}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="donations" class="tab-pane fade">
                                                <h3>Total Bids: {{\App\Bid::countBid($auction->id)}}</h3>
                                                <h3>Highest Bid: {{\App\Bid::maxBid($auction->id)}}</h3>

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Bidder</th>
                                                            <th>Bid Amount</th>
                                                            <th>Date</th>
                                                            <th>Contact</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($bids as $bid)
                                                            @if($auction->winner == $bid->id)
                                                                <tr class="success">
                                                            @else
                                                                <tr>
                                                                    @endif
                                                                    <td>{{$bid->bidder->name}}</td>
                                                                    <td>${{$bid->bid_amount}}
                                                                        @if($auction->winner == $bid->id)
                                                                            @if(\App\Auction::findOrFail($bid->auctionid->id)->paid_status == "yes")

                                                                                <label class="label label-success">Paid</label>
                                                                            @else
                                                                                <label class="label label-danger">Unpaid</label>
                                                                            @endif

                                                                        @endif
                                                                    </td>
                                                                    <td>{{$bid->created_at}}</td>
                                                                    <td>        <a href="{{url('user/auction/'.$bid->id.'/email')}}" class="btn btn-primary btn-xs">Contact Now</a>
                                                                    </td>
                                                                    <td>
                                                                        @if($bid->auctionid->winner == "")
                                                                            <a href="{{url('user/auction/'.$bid->id.'/winner/'.$auction->id)}}" class="btn btn-success btn-xs">Make Winner</a>
                                                                        @else
                                                                            @if($auction->winner == $bid->id)
                                                                                <strong>Winner</strong> (<a href="{{url('user/auction/'.$auction->id.'/cwinner')}}" style="color: red;">Remove</a>)
                                                                            @else
                                                                                Auction Completed
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard view auction details area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop