@extends('user.includes.masterpage-user')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard subscribers data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>My Bids</h2>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
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
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Auction</th>
                                                <th>Bid Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bids as $bid)
                                                <tr>
                                                    <td>{{$bid->created_at}}</td>
                                                    <td>{{$bid->auctionid->title}}</td>
                                                    <td>${{$bid->bid_amount}}</td>
                                                    <td>
                                                        @if($bid->auctionid->status != "open")
                                                            @if($bid->winner == "yes")
                                                                <strong>(Winner)</strong>
                                                                @if(\App\Auction::findOrFail($bid->auctionid->id)->paid_status == "no")
                                                                    <a href="{{url('user/winner/'.$bid->id.'/pay')}}" class="btn btn-primary product-btn">Pay Now</a>
                                                                @else
                                                                    <label class="label label-success">Paid</label>
                                                                @endif
                                                            @else
                                                                Auction Completed
                                                            @endif
                                                        @else
                                                            <a href="mybids/{{$bid->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard subscribers data-table area -->

                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop