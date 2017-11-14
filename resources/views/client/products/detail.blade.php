@extends('client.frontend_master')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb_div">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">HOME</a></li>
                            <li class="breadcrumb-item"><a href="{{action('ProductController@subdescription', $detail->sub_categories_id)}}">{{strtoupper($detail->sub_category_name)}}</a></li>
                            <li class="breadcrumb-item">{{strtoupper($detail->product_name)}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="category_inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product_img">
                                <img src="{{asset("uploads/$detail->product_image")}}" alt={{$detail->product_image}} />
                                <span class="on_display">On Display</span>
                            </div>
                            <?php
                                $images = \App\Image::getImages($detail->id);
                            ?>
                            <ul class="product_thumbnail">
                            @foreach($images as $image)
                                <li><img src="{{asset("uploads/$detail->id/$image->image_name")}}" alt={{$image->image_name}} /></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <div class="product_detail">
                                <h2 class="inner_title">{{$detail->product_name}}</h2>
                                <h3 class="pro_price">${{$detail->product_price}}</h3>
                                <label class="block">Options : </label>
                                <div class="relative">
                                    <span class="select_arrow">
                                        <select>
                                            <option selected="selected">Choose an option</option>
                                            <option>Choose an option 1</option>
                                            <option>Accent Furniture</option>
                                            <option>Bedrooms</option>
                                        </select>
                                    </span>
                                    <a href="#" class="clear_select">Clear</a>
                                </div>
                                <label class="block">Quantity : </label>
                                <div class="quantity margin-bottom-10">
                                    <input type="number" value="1" min="1" name="product[quantity]" />
                                    <div class="quantity-nav">
                                        <div class="quantity-button quantity-up">+</div>
                                        <div class="quantity-button quantity-down">-</div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <a href="#" class="btn shop_btn margin-bottom-15">Add to cart</a>
                                <p class="add_to_wish"><a href="#"><i class="fa fa-heart"></i> Add to Wishlist</a></p>
                                <p>SKU: {{$detail->product_sku_no}}</p>
                                <label class="block">Share This : </label>
                                <div class="social_share">
                                    <a href="#" class="print"><i class="fa fa-print"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="pintrest"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="vertical_tab">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul class="nav nav-tabs tabs-left margin-bottom-15">
                                    <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                                    <li><a href="#information" data-toggle="tab">Additional information</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Description">
                                        <h2 class="inner_title">Description</h2>
                                        <div class="content_text">
                                            <p>{{$detail->product_description}}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="information">
                                        <h2 class="inner_title">Additional information</h2>
                                        <div class="content_text">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection