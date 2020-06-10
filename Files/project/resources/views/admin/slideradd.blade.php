@extends('admin.includes.masterpage-admin')
@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-slider-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add Slider</h2>
                                        <a href="{!! url('admin/sliders') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form  method="POST" action="{!! action('SliderController@store') !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_image">Slider Image*</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="slider_image" accept="image/*" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_title">Slider Title* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" id="slider_title" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_text">Slider Text* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="text" id="slider_text" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_text _position">Slider Text Position*</label>
                                            <div class="col-sm-8">
                                                <select id="slider_text _position" name="text_position" class="form-control" required>
                                                    <option value="slide_style_left">Left</option>
                                                    <option value="slide_style_center" selected>Center</option>
                                                    <option value="slide_style_right">Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add Slider</button>
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