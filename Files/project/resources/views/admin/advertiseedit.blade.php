
@extends('admin.includes.masterpage-admin')

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
                                        <h2>Create New Advertisement</h2>
                                        <a href="{!! url('admin/ads') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
	                        <form method="POST" action="{!! action('AdvertiseController@update',['id'=>$ad->id]) !!}" class="form-horizontal" enctype="multipart/form-data">
	                            {{csrf_field()}}
	                            <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_condition">Select Advertise Type *</label>
                                            <div class="col-sm-6">
                                                <select id="adstype" onchange="adstypes(this.value)" name="type" class="form-control" required>
		                                        <option value="">Select Advertise Type</option>
		                                         @if($ad->type == "banner")
		                                            <option value="banner" selected>Banner</option>
		                                        @else
		                                            <option value="banner">Banner</option>
		                                        @endif
		                                        @if($ad->type == "script")
		                                            <option value="script" selected>Script</option>
		                                        @else
		                                            <option value="script">Script</option>
		                                        @endif
		                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_category">Select Banner Size *</label>
                                            <div class="col-sm-6">
                                                <select name="banner_size" class="form-control" required>
		                                        <option value="">Select Banner Size</option>
		                                         @if($ad->banner_size == "728x90")
                                            <option value="728x90" selected>728x90</option>
                                        @else
                                            <option value="728x90">728x90</option>
                                        @endif
		                                    </select>
                                            </div>
                                        </div>
                                        
		                            <div id="typeoption">
				@if($ad->type == "script")
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="slug">Ad Script <span class="required">*</span>
                                            <p class="small-label">Google Adsense or Others</p>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control" data-validate-length-range="6" name="script" placeholder="Paste Your Ad Script Here.." required="required">{{$ad->script}}</textarea>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="name">Advertiser Name * <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control" value="{{$ad->advertiser_name}}" name="advertiser_name" placeholder="e.g Sports" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="number"> Current Banner *<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="{!! url('/') !!}/assets/images/ads/{{$ad->banner_file}}" style="max-height: 200px;" alt="No Banner Photo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="number"> Change Advertise Banner *<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" accept="image/*" name="banner" id="uploadFile"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="slug">Redirect URL *<span>e.g. http://geniusocean.com</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control" value="{{$ad->redirect_url}}" name="redirect_url" placeholder="e.g. http://geniusocean.com" required="required" type="text">
                                        </div>
                                    </div>
                                @endif
		                            </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Advertisement</button>
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
<script>

function adstypes(type){
    if (type == "banner"){
        $("#typeoption").html('<div class="form-group"><label class="control-label col-sm-4" for="name">Advertiser Name<span class="required">*</span></label><div class="col-sm-6"><input class="form-control" name="advertiser_name" placeholder="e.g CodeCannyon" type="text"></div></div><div class="form-group"><label class="control-label col-md-4" for="number"> Advertise Banner <span class="required">*</span></label><div class="col-md-6"><input type="file" accept="image/*" name="banner" id="uploadFile" required/></div></div><div class="form-group"><label class="control-label col-md-4" for="slug">Redirect URL <span class="small-label">e.g. http://geniusocean.com</span></label><div class="col-md-6"><input class="form-control" name="redirect_url" placeholder="e.g. http://geniusocean.com" required type="text"></div></div>');
    }else if (type == "script"){
        $("#typeoption").html('<div class="form-group"> <label class="control-label col-md-4" for="script">Ad Script <span class="required">*</span> <p class="small-label">Google Adsense or Others</p> </label> <div class="col-md-6"> <textarea class="form-control" name="script" placeholder="Paste Your Ad Script Here.." required></textarea> </div> </div>');
    }else{
        $("#typeoption").html('');
    }
}

</script>
@stop


