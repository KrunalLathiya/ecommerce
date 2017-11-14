<div class="header">
    <div class="topbar clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="top_panel">
                        {{$top->notice}}<a href="#">{{$top->offer}}</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="sub_panel">
                    <div class="col-sm-3">
                        <div class="head_social">
                            <a href="{{$top->mail}}"><i class="fa fa-envelope-o"></i></a>
                            <a href="{{$top->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$top->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$top->instagram}}"><i class="fa fa-instagram"></i></a>
                            <a href="{{$top->pinterest}}"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="sub_detail">PH: {{$top->phno}} | {{$top->address}}<a href="#">Sign In / Register</a></div>
                        <a href="#" class="header-cart">
                            <span class="woocommerce-Price-currencySymbol" data-ce-key="131">$ 0.00(0)</span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="logo_div text-center margin-bottom-15">
                    <a href="{{url('/')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div id="nav">
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <div class="col-sm-12 menu_col">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                            <li><a href="{{url('/')}}">HOME</a></li>
                                @foreach($data as $category)
                                    <?php
                                        $subcategories = \App\Category::find($category->id)->subcategories;
                                    ?>
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown">{{strtoupper($category->category_name)}}</a>
                                        @if(count($subcategories))
                                        <ul class="dropdown-menu multi-level">
                                            @foreach($subcategories as $subcategory)
                                                <li><a href="{{ route('listProducts', [$subcategory->id])}}">{{$subcategory->sub_category_name}}</a></li>
                                            @endforeach
                                         </ul>
                                        @endif  
                                    </li>      
                                @endforeach
                                @if(count($pages))
                                    @foreach($pages as $page)
                                    <li>
                                        <a href="{{action('PageController@show', $page->id)}}">{{strtoupper($page->page_name)}}</a>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>