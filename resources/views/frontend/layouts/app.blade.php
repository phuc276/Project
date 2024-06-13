<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/rate.css') }}">
    <!--[if lt IE 9]>
        <script src="{{ asset('frontend/js/html5shiv.js') }}"></script>
        <script src="{{ asset('frontend/js/respond.min.js') }}"></script>
    <![endif]-->
        <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <script src="{{ asset('frontend/js/jquery.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        
    </head>


    <body>
        @include('frontend.layouts.header')
        @yield('slide')


        <section style="margin-right: 30px;">

            <div class="container">

                <div class="row">
                    <div class="col-sm-3 ">
                        <div class="left-sidebar">

                         @php
                         $currentRouteName = Route::currentRouteName();
                         @endphp


                         @include('frontend.layouts.sidebar')
                      
                         {{-- stristr --}}

                     </div>
                 </div>

                 <div class="col-sm-9" >
                    @yield('content')
                </div>


            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')



    <script type="text/javascript" src="{{ asset('http://maps.google.com/maps/api/js?sensor=true') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/gmaps.js') }}"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>


</body>