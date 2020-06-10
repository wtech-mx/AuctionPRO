@extends('admin.includes.masterpage-admin')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Send Email to ({{$customer->name}})</h2>
                                        <a href="{!! url()->previous() !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('UsersController@sendemail') !!}" class="form-horizontal form-label-left">
	                            {{csrf_field()}}
	                            <input type="hidden" value="{{$customer->email}}" name="to">
	                            <div class="item form-group">
	                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subject<span class="required">*</span>
	
	                                </label>
	                                <div class="col-md-6 col-sm-6 col-xs-12">
	                                    <input id="name" class="form-control col-md-7 col-xs-12" name="subject" placeholder="e.g Subject" required="required" type="text">
	                                </div>
	                            </div>
	                            <div class="item form-group">
	                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Message<span class="required">*</span>
	
	                                </label>
	                                <div class="col-md-6 col-sm-6 col-xs-12">
	                                    <textarea name="message" rows="10" placeholder="Write Message" class="form-control" required></textarea>
	                                </div>
	                            </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Send Email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->

                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop