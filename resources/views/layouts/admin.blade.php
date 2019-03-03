<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <title>@yield('title') {{ config('app.name', 'TEDxMIU') }}</title>
</head>
<body>
<!-- HEADER NAVBAR
    ======================================================-->
@include('partials.navbar')
<div id="app">
    @yield('content')
</div>
@include('partials.footer')



<script src="{{asset('js/jquery3.3.1.min.js')}}"></script>
<script src="{{asset('js/slider/slider.js')}}"></script>
<script src="{{asset('js/slider/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('js/startupTemplate/vendor/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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


<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
