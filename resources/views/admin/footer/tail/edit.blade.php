@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Footer Menu Item</h3>
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
                        <form method="post" action="{{action('FooterTailController@update', $id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="menu_item_name">Menu Item Name</label>
                                <input type="text" name="menu_item_name" value="{{$tail->menu_item_name}}" class="form-control" id="menu_item_name" placeholder="Enter Menu Name" required />
                            </div>
                            <div class="form-group">
                                <label for="menu_item_description">Menu Item Description</label>
                                <textarea cols="20" rows="20" name="menu_item_description" class="form-control" id="menu_item_description" placeholder="Enter Menu Item Description" required />{{$tail->menu_item_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="menu_item_main_image">Menu Item Main Image</label>
                                <input type="file" name="menu_item_main_image" class="form-control" id="menu_item_main_image" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update Footer Menu Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection