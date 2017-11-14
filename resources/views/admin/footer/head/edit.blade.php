@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Footer Head Item</h3>
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
                                <label for="item_name">Item Name</label>
                                <input type="text" name="item_name" class="form-control" id="item_name" value="{{$head->item_name}}" placeholder="Enter Item Name" required />
                            </div>
                            <div class="form-group">
                                <label for="item_description">Item Description</label>
                                <input type="text" name="item_description" class="form-control" id="item_description" value="{{$head->item_description}}" placeholder="Enter Item Description" required />
                            </div>
                            <div class="form-group">
                                <label for="glyphiconclass">Item Main Image</label>
                                <input type="text" name="glyphiconclass" class="form-control" id="glyphiconclass" required value="{{$head->glyphiconclass}}" placeholder="Enter Glyphicon class" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update Menu Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection