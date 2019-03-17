<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') {{ config('app.name', 'TEDxMIU') }}</title>
    {{--<meta property="og:local" content="en_US">--}}
    {{--<meta property="og:type" content="article">--}}
    {{--<meta property="og:title" content="TEDxMIU">--}}
    {{--<meta property="og:description" content="This is a description">--}}
    {{--<meta property="og:url" content="http://tedxmiu.test/speaker/3">--}}
    {{--<meta property="og:site_name" content="TEDxMIU">--}}
    {{--<meta property="og:image" content="{{asset('images/icon.png')}}">--}}


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!--<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">-->

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slider/slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/startupTemplate/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">


    @yield('css')
    {{--<script src=“//platform-api.sharethis.com/js/sharethis.js#property=5c8c1abb1c07550011f24d77&product=inline-share-buttons”></script>--}}
</head>
<body>
<div id="fb-root"></div>
<!-- HEADER NAVBAR
    ======================================================-->
@include('partials.navbar')
<div id="app">
    @yield('content')
    @include('partials.footer')
</div>

<script src="{{asset('js/jquery3.3.1.min.js')}}"></script>
<script src="{{asset('js/slider/slider.js')}}"></script>
<script src="{{asset('js/slider/demo.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('js/startupTemplate/vendor/bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>--}}
<script src="{{asset('js/startupTemplate/easing.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/hoverIntent.js')}}"></script>
<script src="{{asset('js/startupTemplate/superfish.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/jquery.sticky.js')}}"></script>
<script src="{{asset('js/startupTemplate/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/parallax.min.js')}}"></script>
<script src="{{asset('js/startupTemplate/mail-script.js')}}"></script>
<script src="{{asset('js/startupTemplate/main.js')}}"></script>

{{--<script src="{{asset('js/vue-social-sharing.min.js')}}"></script>--}}

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
