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
                        <h3 class="box-title">All Menu Items</h3>
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
                                <th width="150">Menu Item Name</th>
                                <th width="400">Menu Item Description</th>
                                <th>Menu Item Image</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($tails as $tail)
                                <tr>
                                    <td>{{$tail->id}}</td>
                                    <td>{{$tail->menu_item_name}}</td>
                                    <td>{{$tail->menu_item_description}}</td>
                                    <td><img src="{{ asset("uploads/$tail->menu_item_main_image") }}" alt="{{$tail->menu_item_main_image}}" width="100" height="100"/></td>
                                    <td><a href="{{action('FooterTailController@edit', $tail->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{action('FooterTailController@delete', $tail->id)}}" class="btn btn-danger" onclick="return  confirm('do you want to delete')">Delete</a></td>
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