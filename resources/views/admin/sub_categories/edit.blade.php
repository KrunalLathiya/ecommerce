@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub Category</h3>
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
                        <form method="post" action="{{action('SubCategoryController@update', $id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="category_id">Select Sub Category</label>
                                <select name="category_id" required>
                                <option value="">--Select Categories--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $subcategory->category_id) selected @endif>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Sub Category Name</label>
                                <input type="text" name="sub_category_name" class="form-control" id="sub_category_name" placeholder="Enter Category Name" value="{{ $subcategory->sub_category_name }}" />
                            </div>
                            <div class="form-group">
                                <label for="sub_category_description">Sub Category Description</label>
                                <textarea cols="10" rows="10" name="sub_category_description" class="form-control" id="sub_category_description" placeholder="Enter Sub Category Description" required>{{$subcategory->sub_category_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="sub_main_image">Sub Category Main Image</label>
                                <input type="file" name="sub_main_image" class="form-control" id="sub_main_image"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Sub Category</button>
                        </form>
                    </div>
                    <div class="box-body">
                        <img src="{{asset("uploads/$subcategory->sub_main_image")}}" alt={{$subcategory->sub_main_image}} />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection