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
                        <h3 class="box-title">All Footer Items</h3>
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
                                <th width="150">Item Name</th>
                                <th width="400">Item Description</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($heads as $head)
                                <tr>
                                    <td>{{$head->id}}</td>
                                    <td>{{$head->item_name}}</td>
                                    <td>{{$head->item_description}}</td>
                                    <td><a href="{{action('FooterHeadController@edit', $head->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{action('FooterHeadController@delete', $head->id)}}" class="btn btn-danger" onclick="return  confirm('do you want to delete')">Delete</a></td>
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