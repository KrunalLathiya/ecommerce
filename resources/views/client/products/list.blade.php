@extends('client.frontend_master')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_div">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">{!!strtoupper($description[0]->category_name)!!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
    <div class="category_inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="inner_title">{!!strtoupper($description[0]->category_name)!!}</h2>
                        <?php $img = $description[0]->sub_main_image ?>
                    <img class="margin-bottom-15" src="{{asset("uploads/$img")}}" alt={{$description[0]->sub_main_image}} />
                    <div class="content_text margin-bottom-15">
                        <p>{!! $description[0]->sub_category_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="row grid_row">
                <?php $imgs = new \App\Product;  $products = $imgs->getMainImage($description[0]->sub_category_id); ?>
                @if(count($products))
                    @foreach($products as $product)
                    <div class="col-sm-3">
                        <div class="cate_items">
                            <a href="{{action('ProductController@detail', $product->id)}}">
                                <div class="item_img">
                                    <img src="{{asset("uploads/$product->product_image")}}" alt={{$product->product_image}} />
                                </div>
                                <h3>{{$product->product_name}} <span>({{$product->product_quantity}})</span></h3>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div> 
</div>
@endsection