<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//TR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Furniture</title>
        <meta name="robots" content="noindex, nofollow" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/front/images/favicon.ico" />
        <link rel='stylesheet' id='googleFontsOpenSans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A400%2C600%2C700%2C800%2C300&#038;ver=4.8.2' type='text/css' media='all' />
        <link rel='stylesheet' id='customizer_dustlandexpress_theme_fonts-css'  href='//fonts.googleapis.com/css?family=Lato%3Aregular%2Citalic%2C700%26subset%3Dlatin%2C' type='text/css' media='screen' />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('frontend/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('frontend/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('frontend/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('frontend/css/style.css')}}" />
    </head>
    <body class="home_page">
        @include('client.partials.header')
        @yield('content')
        @include('client.partials.footer')
    </body>
</html>