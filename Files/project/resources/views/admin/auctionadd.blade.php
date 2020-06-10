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
                                        <h2>Create New Auction</h2>
                                        <a href="{!! url('admin/auction') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('AuctionController@store') !!}" class="form-horizontal"  enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="auction_name">Auction Name*</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="title" id="auction_name" placeholder="Enter Auction Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_category">Select Category *</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="category" id="select_auction_category">
                                                    <option value="">Please select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="select_auction_condition">Select Condition *</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="condition" id="select_auction_condition">
                                                    <option value="">Please Select Condition</option>
                                                    <option value="New">New</option>
                                                    <option value="Used">Used</option>
                                                    <option value="Recondition">Recondition</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_feature_photo">Current Feature Photo*</label>
                                            <div class="col-sm-6">
                                                <img src="" style="max-width: 200px;" alt="No Photo Added" id="docphoto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_feature_photo">Feature Photo *</label>
                                            <div class="col-sm-6">
                                                <input type="file" accept="image/*" name="photo" class="hidden" onchange="readURL(this)" id="uploadFile"/>
                                                <div id="uploadTrigger" class="btn btn-default"><i class="fa fa-upload"></i> Add Feature Photo</div><br><br>
                                                <p>Preferred Image Ratio: (16:9)</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="auction_gallery_images">Auction Gallery Images <span>(Optional) </span></label>
                                            <div class="col-sm-6">
                                                <input type="file" accept="image/*" name="gallery[]" multiple/>
                                                <p>Multiple Image Allowed</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="auction_description">Auction Description*</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="description" id="auction_description" rows="5" style="resize: vertical;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="auction_end_date">End Date*</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control datepick" name="end_date" id="auction_end_date" placeholder="Enter End Date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="auction_buy_price">Buy Now Price* <span>in USD($)</span></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="price" id="auction_buy_price" placeholder="Enter Price" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="start_bid_amount">Start Bid Amount* <span>in USD($)</span></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="start_amount" id="start_bid_amount" placeholder="Enter Bid Amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-6" data-toggle="buttons">
                                                <div class="btn btn-default">
                                                    <input type="checkbox" name="featured" value="1" autocomplete="off">
                                                    <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                                    Add to Featured Auction
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Create Auction</button>
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

        $(".datepick").datepicker({
            minDate: new Date(),
            dateFormat: 'yy-mm-dd'
        });

        $("#uploadTrigger").click(function(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                $("#uploadTrigger").html($("#uploadFile").val());
            });
        });
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#docphoto').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('auction_description');
        });
    </script>
@stop