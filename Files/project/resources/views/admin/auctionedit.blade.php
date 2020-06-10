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
                                        <h2>Update Auction</h2>
                                        <a href="{!! url('admin/auction') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('AuctionController@update',['id'=> $auction->id]) !!}" id="add_form" class="form-horizontal form-label-left"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Auction Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="title" value="{{$auction->title}}" placeholder="Auction Name" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Select Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="category" class="form-control selectpicker" required>
                                        <option value="">Please Select Category</option>
                                        @foreach($categories as $category)
                                            @if($category->name == $auction->category)
                                                <option value="{{$category->name}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Select Condition <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="condition" class="form-control selectpicker" required>
                                        <option value="">Please Select Condition</option>
                                        @if($auction->condition == "New")
                                            <option value="New" selected>New</option>
                                        @else
                                            <option value="New">New</option>
                                        @endif
                                        @if($auction->condition == "Used")
                                            <option value="Used" selected>Used</option>
                                        @else
                                            <option value="Used">Used</option>
                                        @endif
                                        @if($auction->condition == "Recondition")
                                            <option value="Recondition" selected>Recondition</option>
                                        @else
                                            <option value="Recondition">Recondition</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Feature Photo<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <img src="{{url('/')}}/assets/images/auction/{{$auction->feature_image}}" style="max-width: 200px;" alt="No Photo Added" id="docphoto">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Feature Photo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" accept="image/*" name="photo" class="hidden" onchange="readURL(this)" id="uploadFile"/>
                                    <div id="uploadTrigger" class="form-control btn btn-default"><i class="fa fa-upload"></i> Add Feature Photo</div><br><br>
                                    <p class="small-label">Prefered Image Ratio: (16:9)</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="galdel" value="1"/>
                                            Delete Old Gallery Images</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Product Gallery Images <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" accept="image/*" name="gallery[]" multiple/>
                                    <br>
                                    <p class="small-label">Multiple Image Allowed</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Auction Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="profiledesc" name="description">{{$auction->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-line"></div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">End Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12 datepick" value="{{$auction->end_date}}" name="end_date" placeholder="End Date" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Buy Now Price *<span>in USD($)</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="price" value="{{$auction->price}}" placeholder="Buy Now Price" type="number" step=".01" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Start Bid Amount *<span>in USD($)</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="start_amount" value="{{$auction->start_amount}}" placeholder="Auction Start Amount" type="number" step=".01" required>
                                </div>
                            </div>
                            <div class="form-group">
                                            <label class="control-label col-sm-3"></label>
                                            <div class="col-sm-6" data-toggle="buttons">
                                    @if($auction->featured == 1)
                                        <div class="btn btn-default active">
                                            <input type="checkbox" name="featured" value="1" autocomplete="off" checked>
                                            <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                            Add to Featured Auction
                                        </div>
                                    @else
                                        <div class="btn btn-default">
                                            <input type="checkbox" name="featured" value="1" autocomplete="off">
                                            <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                            Add to Featured Auction
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="add_ads" type="submit" class="btn btn-success  add-product_btn">Update Auction</button>
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
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('profiledesc');
        });
    </script>
@stop