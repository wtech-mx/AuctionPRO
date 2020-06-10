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
                                        <h2>Withdraw Available Balance</h2>
                                        <a href="{!! url('user/withdraw') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div class="col-md-12">
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

                                        <form method="POST" action="{!! action('UserAuctionController@withdraws') !!}" class="form-horizontal">
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                                </label>
                                                <div class="col-md-8">
                                                    <h4>Current Account Balance: ${{Auth::user()->acc_balance}}</h4>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Withdraw Method<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="form-control" name="methods" id="withmethod" required>
                                                        <option value="">Select Withdraw Method</option>
                                                        <option value="Paypal">Paypal</option>
                                                        <option value="Skrill">Skrill</option>
                                                        <option value="Payoneer">Payoneer</option>
                                                        <option value="Bank">Bank</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Withdraw Amount<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12" name="amount" value="{{Auth::user()->acc_balance}}" placeholder="e.g sports" required="required" type="text">
                                                </div>
                                            </div>

                                            <div id="paypal" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Account Email<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="acc_email" value="{{ old('acc_email') }}" placeholder="Enter Account Email" class="form-control" type="email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="bank" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Country<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control" name="acc_country">
                                                            <option value="">Select Country</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->name}}">{{$country->nicename}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">IBAN/Account No<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="iban" value="{{ old('iban') }}" placeholder="Enter IBAN/Account No" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Account Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="acc_name" value="{{ old('accname') }}" placeholder="Enter Account Name" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="address" value="{{ old('address') }}" placeholder="Enter Address" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Bank Swift Code<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="swift" value="{{ old('swift') }}" placeholder="Enter Swift Code" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Withdraw</button>
                                            </div>
                                        </form>
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
<script>
    $("#withmethod").change(function(){
        var method = $(this).val();
        if(method == "Bank"){

            $("#bank").show();
            $("#bank").find('input, select').attr('required',true);

            $("#paypal").hide();
            $("#cash").hide();
            $("#paypal").find('input').attr('required',false);
            $("#cash").find('input').attr('required',false);

        }
        if(method !== "Bank" && method !== "Hand Cash"){
            $("#cash").hide();
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);
            $("#cash").find('input, select').attr('required',false);

            $("#paypal").show();
            $("#paypal").find('input').attr('required',true);
        }
        if(method == "Hand Cash"){
            $("#paypal").hide();
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);
            $("#paypal").find('input, select').attr('required',false);

            $("#cash").show();
            $("#cash").find('input').attr('required',true);
        }
        if(method == ""){
            $("#bank").hide();
            $("#paypal").hide();
            $("#cash").hide();
        }

    })
</script>
@stop