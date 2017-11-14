@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Products</h3>
                    </div>
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif
                    <div class="box-body">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>Category Name</th>
                                <th>SubCategory Name</th>
                                <th>Product SKU Number</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Qunatity</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->sub_category_name}}</td>
                                    <td>{{$product->product_sku_no}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_description}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td><a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{action('ProductController@delete', $product->id)}}" class="btn btn-danger" onclick="return  confirm('do you want to delete')">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection