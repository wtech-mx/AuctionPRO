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
                                    <form method="POST" action="{!! action('AdvertiseController@store') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_condition">Select Advertise Type *</label>
                                            <div class="col-sm-6">
                                                <select id="adstype" onchange="adstypes(this.value)" name="type" class="form-control" required>
		                                        <option value="">Select Advertise Type</option>
		                                        <option value="banner">Banner</option>
		                                        <option value="script">Script</option>
		                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_category">Select Banner Size *</label>
                                            <div class="col-sm-6">
                                                <select name="banner_size" class="form-control" required>
		                                        <option value="">Select Banner Size</option>
		                                        <option value="728x90">728x90</option>
		                                    </select>
                                            </div>
                                        </div>
                                        
		                            <div id="typeoption">
		
		                            </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add New Advertisement</button>
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