@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard User Details -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>User Details</h2>
                                        <a href="{!! url('admin/users') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <td width="30%"><strong>User ID#</strong></td>
                                                <td>{{$customer->id}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Account Status: </strong></td>
                                                @if($customer->status != 0)
                                                    <td style="color: #008000;"> <strong>Active</strong></td>
                                                @else
                                                    <td style="color: #ff0000;"><strong>Banned</strong></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>User Name:</strong></td>
                                                <td>{{$customer->name}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>User Email:</strong></td>
                                                <td>{{$customer->email}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>User Phone:</strong></td>
                                                <td>{{$customer->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Country:</strong></td>
                                                <td>{{$customer->country}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Auction Created:</strong></td>
                                                <td>{{\App\Auction::where('createdby',$customer->id)->count()}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Joined:</strong></td>
                                                <td>{{$customer->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr/>
                                    <a href="email/{{$customer->id}}" class="btn add-product_btn order-details"><i class="fa fa-send"></i> Contact Customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard User Details -->
                    
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop