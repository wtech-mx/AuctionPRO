@extends('user.includes.masterpage-user')

@section('content')

    
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Create New Campaign area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Update Auction</h2>
                                        <a href="{!! url('user/auction') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                        <div id="response" class="col-md-12">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                           
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Auction Title</strong></td>
                                <td><a href="{{url('/auction/'.$auction->id)}}" target="_blank">{{$auction->title}}</a></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Auction Status:</strong></td>
                                <td>{{ucfirst($auction->status)}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>End Date:</strong></td>
                                <td>{{date('jS F Y',strtotime($auction->created_at))}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Item Price:</strong></td>
                                <td>${{$auction->price}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Total Bid:</strong></td>
                                <td>{{\App\Bid::countBid($auction->id)}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Highest Bid:</strong></td>
                                <td>{{\App\Bid::maxBid($auction->id)}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Your Current Bid:</strong></td>
                                <td>${{$bid->bid_amount}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <form method="POST" action="{!! action('UserBidController@update',['id' => $bid->id]) !!}" class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Place Your New Bid *
                                    <span>in USD($)</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="bid_amount" value="{{$bid->bid_amount}}" placeholder="e.g Sports" required="required" type="number">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-default add-newProduct-btn">Update My Bid</button>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Create New Campaign area -->

                </div>
            </div>
        </div>
@stop

@section('footer')

@stop