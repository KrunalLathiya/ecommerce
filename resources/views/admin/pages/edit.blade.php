@extends('admin.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Page</h3>
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
                        <form method="post" action="{{action('PageController@update', $id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="page_name">Page Name</label>
                                <input type="text" name="page_name" class="form-control" id="page_name" placeholder="Enter Page Name" value="{{$page->page_name}}" required />
                            </div>
                            <div class="form-group">
                                <label for="page_name">Page Content</label>
                                <textarea cols="20" rows="20" name="page_content" class="form-control" id="page_content" placeholder="Enter Page Content" required>{{$page->page_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="page_image">Page Main Image</label>
                                <input type="file" name="page_main_image" class="form-control" id="page_main_image" required/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Page</button>
                        </form>
                    </div>
                    <div class="box-body">
                        <img src="{{asset("uploads/$page->page_main_image")}}" alt={{$page->page_name}} />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection