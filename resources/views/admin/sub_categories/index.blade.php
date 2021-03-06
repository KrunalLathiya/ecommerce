@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All SubCategories</h3>
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
                                <th>ID</th>
                                <th>Sub Category Name</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$subcategory->id}}</td>
                                    <td>{{$subcategory->sub_category_name}}</td>
                                    <td><a href="{{action('SubCategoryController@edit', $subcategory->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{action('SubCategoryController@delete', $subcategory->id)}}" class="btn btn-danger" onclick="return  confirm('do you want to delete')">Delete</a></td>
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