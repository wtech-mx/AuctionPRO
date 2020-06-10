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
                                        <h2>My Withdraws</h2>
                                        <a href="{!! url('user/withdrawform') !!}" class="add-newProduct-btn"><i class="fa fa-download"></i> Withdraw Now</a>
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
                                                <th>Withdraw Date</th>
                                                <th width="10%">Method</th>
                                                <th width="30%">Account</th>
                                                <th width="10%">Amount</th>
                                                <th width="10%">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($withdraws as $withdraw)
                                                <tr>
                                                    <td>{{$withdraw->created_at}}</td>
                                                    <td>{{$withdraw->method}}</td>
                                                    @if($withdraw->method != "Bank")
                                                        <td>{{$withdraw->acc_email}}</td>
                                                    @else
                                                        <td>{{$withdraw->iban}}</td>
                                                    @endif
                                                    <td>${{$withdraw->amount}}</td>
                                                    <td>{{ucfirst($withdraw->status)}}</td>
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