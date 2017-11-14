@extends('client.frontend_master')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 margin-bottom-15">
                    <img src="{{asset("uploads/$page->page_main_image")}}" alt={{$page->page_content}} />
            </div>
        </div>
        <div class="row margin-bottom-15">
            <div class="col-md-12">
                {!!$page->page_content!!}
            </div>
        </div>
    </div>
</div>
@endsection
