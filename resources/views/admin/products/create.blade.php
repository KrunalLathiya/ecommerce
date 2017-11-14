@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Products</h3>
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
                        <form method="post" action="{{action('ProductController@store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="category_id">Select Category</label>
                                    </div>
                                    <div class="col-md-10">
                                    <select name="category_id" class="select_ctr" required>
                                        <option value="">--Select Categories--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sub_category_id">Select Sub Category</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="sub_category_id" class="sub_ctr" required>
                                        <option value="">--Select SubCategories--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_name">Product Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_sku_no">Product SKU No.</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="product_sku_no" class="form-control" id="product_sku_no" placeholder="Enter Product SKU NO." required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_price">Product Price</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Enter Product Price" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_quanity">Product Quantity</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="number" name="product_quantity" class="form-control" id="product_quantity" placeholder="Enter Product Quantity" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_description">Product Description</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="product_description" row="5" cols="5" class="form-control" id="product_description" placeholder="Enter Product Description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-md-2">
                                            <label for="product_image">Image</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div data-duplicate="demo">
                                                <input type="file" name="product_image"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="product_description">Product Options </label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="options" required>
                                            <option value="">--Select Options--</option>
                                            <option value="double bed">Double Bed</option>
                                            <option value="single bed">Single Bed</option>
                                            <option value="two seat bed">Two Seat Bed</option>
                                            <option value="three seat bed">Three Seat Bed</option>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div><br/>
                        </form>
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