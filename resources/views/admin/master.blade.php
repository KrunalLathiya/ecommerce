<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Website</title>
    <link rel="stylesheet" href="{{asset('css/master.css')}}"/>
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        @yield('content')
    </div>
</body>
</html>