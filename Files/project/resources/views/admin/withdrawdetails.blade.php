@extends('admin.includes.masterpage-admin')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Withdraw Details -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Withdraw Details</h2>
                                        <a href="{!! url()->previous() !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <td width="30%"><strong>Customer ID#</strong></td>
                                                <td>{{$withdraw->id}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Withdraw Amount:</strong></td>
                                                <td><strong style="color:green">${{$withdraw->amount}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Withdraw Fee:</strong></td>
                                                <td><strong>${{$withdraw->fee}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Withdraw Process Date:</strong></td>
                                                <td>{{$withdraw->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Withdraw Status:</strong></td>
                                                <td><strong>{{ucfirst($withdraw->status)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>User Name:</strong></td>
                                                <td><a href="{{url('admin/users/'.$withdraw->userid->id)}}" target="_blank">{{$withdraw->userid->name}}</a></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Owner Email:</strong></td>
                                                <td>{{$withdraw->userid->email}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Owner Phone:</strong></td>
                                                <td>{{$withdraw->userid->phone}}</td>
                                            </tr>

                                            <tr>
                                                <td width="30%"><strong>Withdraw Method:</strong></td>
                                                <td>{{$withdraw->method}}</td>
                                            </tr>
                                            @if($withdraw->method != "Bank" && $withdraw->method != "Hand Cash")
                                                <tr>
                                                    <td width="30%"><strong>{{$withdraw->method}} Email:</strong></td>
                                                    <td>{{$withdraw->acc_email}}</td>
                                                </tr>
                                            @elseif($withdraw->method == "Hand Cash")
                                                <tr>
                                                    <td width="30%"><strong>Cash Receiver Email:</strong></td>
                                                    <td>{{$withdraw->acc_email}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><strong>Cash Receiver Phone:</strong></td>
                                                    <td>{{$withdraw->acc_phone}}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="30%"><strong>{{$withdraw->method}} Account:</strong></td>
                                                    <td>{{$withdraw->iban}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><strong>Account Name:</strong></td>
                                                    <td>{{$withdraw->acc_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><strong>Country:</strong></td>
                                                    <td>{{ucfirst(strtolower($withdraw->country))}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><strong>Address:</strong></td>
                                                    <td>{{$withdraw->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><strong>{{$withdraw->method}} Swift Code:</strong></td>
                                                    <td>{{$withdraw->swift}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td width="30%"><a href="accept/{{$withdraw->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a></td>

                                                <td><a href="reject/{{$withdraw->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a></td>
                                            </tr>
                                        </table>
                                    </div>
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