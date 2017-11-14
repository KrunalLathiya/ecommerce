<div class="footer">
<div class="footer_bot">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ul class="text-center">
                    @foreach($footertail as $footer)
                        <li><a href="{{action('FooterTailController@show', $footer->id)}}">{{strtoupper($footer->menu_item_name)}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<a href="javascript:void(0);" id="back_scroll"><i class="fa fa-angle-up"></i></a>
</div>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type='text/javascript' src="{{asset('frontend/js/script.js')}}"></script>
<script  type='text/javascript'>
    $(document).ready(function () {
        $(".banner_slide").owlCarousel({
            nav: true,
            loop: true,
            items: 1,
            margin: 20,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        });
    });
</script>