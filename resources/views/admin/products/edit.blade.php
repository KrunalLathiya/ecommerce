@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Product</h3>
                    </div>
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="box-body">
                        <form method="post" action="{{action('ProductController@update',$id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="category_id">Select Category :</label>
                                <select name="category_id" class="select_ctr" required>
                                <option value="">--Select Categories--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">Select Sub Category: </label>
                                <select name="sub_category_id" class="sub_ctr" required>
                                <option value="">--Select SubCategories--</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" @if($subcategory->id == $product->sub_category_id) selected @endif>{{$subcategory->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" value="{{$product->product_name}}" required />
                            </div>
                            <div class="form-group">
                                <label for="product_sku_no">Product SKU No.</label>
                                <input type="text" name="product_sku_no" class="form-control" id="product_sku_no" placeholder="Enter Product SKU NO." value="{{$product->product_sku_no}}"  required />
                            </div>
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Enter Product Price" value="{{$product->product_price}}" required />
                            </div>
                            <div class="form-group">
                                <label for="product_quanity">Product Quantity</label>
                                <input type="number" name="product_quantity" class="form-control" id="product_quantity" placeholder="Enter Product Quantity" value="{{$product->product_quantity}}" required />
                            </div>
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <textarea name="product_description" row="5" cols="5" class="form-control" id="product_description" placeholder="Enter Product Description" required>{{$product->product_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-md-2">
                                            <label for="product_description">Images</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div data-duplicate="demo">
                                                <input type="file" name="product_images[]" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button data-duplicate-add="demo" class="btn btn-success add">
                                                Add
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button data-duplicate-remove="demo" class="btn btn-danger remove">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="product_description">Product Options </label>
                                    <select name="options" required>
                                        <option value="">--Select Options--</option>
                                        <option value="double bed" @if('double bed' == $product->options) selected @endif>  Double Bed</option>
                                        <option value="single bed" @if('single bed' == $product->options) selected @endif> Single Bed</option>
                                        <option value="two seat bed" @if('two seat bed' == $product->options) selected @endif>Two Seat Bed</option>
                                        <option value="three seat bed" @if('three seat bed' == $product->options) selected @endif> Three Seat Bed</option>  
                                    </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                        <div class="row">
                            <?php
                                $images = \App\Image::getImages($id);
                            ?>
                            @foreach($images as $image)
                            <div class="col-md-4">
                                <img src="{{asset("uploads/$id/$image->image_name")}}" alt={{$image->image_name}} height="100" width="100"/>
                                <a href="{{action('ProductController@deleteImage', $image->id)}}" class="btn btn-danger">Delete</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.add').click(function(e){
            e.preventDefault();
        })
    });
    jQuery(document).ready(function() {
        jQuery('.remove').click(function(e){
            e.preventDefault();
        })
    });

    jQuery(document).ready(function() {
        jQuery('.select_ctr').on('change', function(e){
            e.preventDefault();
            var val = $(this).val();
            var url = "{{url('admin/subcategories/get')}}"+'/'+val;
            jQuery.ajax({url: url, success: function(result){
                jQuery(".sub_ctr option").remove();
                for(i=0;i<result.length;i++)
                {
                    $(".sub_ctr").append('<option value='+result[i].id+'>'+result[i].sub_category_name+'</option>');
                }
            }});
        })
    })
</script>
<script src="{{asset('js/jquery.duplicate.min.js')}}"></script>
@endsection