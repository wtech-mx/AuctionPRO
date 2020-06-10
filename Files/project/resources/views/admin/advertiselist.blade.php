@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard orders data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box customers">
                                    <div class="add-product-header">
                                        <h2>Advertisements</h2>
                                        <a href="{!! url('admin/ads/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> Add New Advertisement</a>
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
                                        </div>
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Ad Type</th>
                                                <th>Banner Image</th>
                                                <th>Redirect URL</th>
                                                <th>Banner Size</th>
                                                <th>Clicks</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ads as $ad)
                                                <tr>
                                                    <td>{{ucfirst($ad->type)}}</td>
                                                    <td>
                                                        @if($ad->banner_file != null)
                                                            <img src="../assets/images/ads/{{$ad->banner_file}}" style="width: 250px;" class="manage-ads" alt="ad1.jpg">
                                                        @else
                                                            No Need
                                                        @endif
                                                    </td>
                                                    <td>{{$ad->redirect_url}}</td>
                                                    <td>{{$ad->banner_size}}</td>
                                                    <td>{{$ad->clicks}}</td>
                                                    <td>{{$ad->status}}</td>
                                                    <td>

                                                        <form method="POST" action="{!! action('AdvertiseController@destroy',['id' => $ad->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{!! url('admin/ads') !!}/{{$ad->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
                                                            @if($ad->status==1)
                                                                <a href="{!! url('admin/ads') !!}/status/{{$ad->id}}/0" class="btn btn-warning product-btn"><i class="fa fa-times"></i> Deactive </a>
                                                            @else
                                                                <a href="{!! url('admin/ads') !!}/status/{{$ad->id}}/1" class="btn btn-primary product-btn"><i class="fa fa-times"></i> Active </a>
                                                            @endif
                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                        </form>
                                                    </td>
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
                    <!-- Ending of Dashboard orders data-table area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop