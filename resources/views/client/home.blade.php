@extends('client.frontend_master')
@section('content')

<div class="wrapper">
            <div class="banner_slider">
                <div class="owl-carousel banner_slide">
                    <div class="item">
                        <img src="{{asset('frontend/img/slider1.jpg')}}" alt="" />
                    </div>
                    <div class="item">
                        <img src="{{asset('frontend/img/slider2.jpg')}}" alt="" />
                    </div>
                </div>
            </div>

            <div class="category_div">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="header_border">Shop by Categories</h2>
                            <hr class="custom_hr" />

                            <div class="category_box text-center">
                                <ul>
                                    @foreach($subcategories as $subcategory)
                                    <li>
                                        <a href="{{action('ProductController@subdescription', $subcategory->id)}}" class="img_tag"><img src="{{asset("uploads/$subcategory->sub_main_image")}}" alt="" /></a>
                                        <a href="{{action('ProductController@subdescription', $subcategory->id)}}" class="btn shop_btn">{{$subcategory->sub_category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <hr class="custom_hr" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="home_ex_footer text-center margin-bottom-15">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($footerhead as $head)
                        <div class="col-sm-3">
                            <a href="#" class="icon_for"><i class="{{$head->glyphiconclass}}"></i></a>
                            <div class="icon_detail">
                                <p>{{$head->item_name}}</p>
                                <p>{{$head->item_description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection