@extends('admin.master')
@section('content')
<style>
    table.fixed { table-layout:fixed; }
    table.fixed td { overflow: hidden; }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Pages</h3>
                    </div>
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif
                    <div class="box-body">
                        <div class="table-responsive">
                        <table class="table fixed table-bordered">
                            <thead>
                                <th width="40">ID</th>
                                <th width="150">Page Name</th>
                                <th width="400">Page Content</th>
                                <th>Page Image</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->id}}</td>
                                    <td>{{$page->page_name}}</td>
                                    <td>{{$page->page_content}}</td>
                                    <td><img src="{{ asset("uploads/$page->page_main_image") }}" alt="{{$page->page_main_image}}" width="100" height="100"/></td>
                                    <td><a href="{{action('PageController@edit', $page->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{action('PageController@delete', $page->id)}}" class="btn btn-danger" onclick="return  confirm('do you want to delete')">Delete</a></td>
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