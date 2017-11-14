@extends('client.frontend_master')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 margin-bottom-15">
                <img src="{{asset("uploads/$footercontent->menu_item_main_image")}}" alt={{$footercontent->menu_item_main_image}} />
            </div>
        </div>
        <div class="row margin-bottom-15">
            <div class="col-md-12">
                {!!$footercontent->menu_item_description!!}
            </div>
        </div>
    </div>
</div>
@endsection
