<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Shopper</title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
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

    </head>

    <body>
        <header id="header">
            <!--header_top-->
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header_top-->

            <div class="header-middle">
                <!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 clearfix">
                            <div class="logo pull-left">
                                <a href="index.html"><img src="{{ asset('frontend/images/home/logo.png') }}" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right clearfix">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        USA
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canada</a></li>
                                        <li><a href="#">UK</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        DOLLAR
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canadian Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 clearfix">
                            <div class="shop-menu clearfix pull-right">
                                <ul class="nav navbar-nav">

                                    @guest 
                                    <li><a href="{{ url('user/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="{{ url('user/cart') }}" ><i class="fa fa-shopping-cart" id="totalcart"></i> Cart</a></li>
                                    <li><a href="{{ url('user/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                    <li><a href="{{ url('user/register') }}"><i class="fa fa-lock"></i> Register</a></li>


                                    @else 
                                    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                    <li><a href="{{ url('/user/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="{{ url('/user/cart') }}" ><i class="fa fa-shopping-cart" id="totalcart"></i> Cart</a></li>
                                    <li><a href="{{ url('/user/account') }}"><i class="fa fa-user"></i> Account</a></li>

                                    <li><a href="{{ url('/user/logoutshop') }}">
                                        <i class="fa fa-lock"></i> Logout
                                    </a></li>


                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->

            <div class="header-bottom">
                <!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{url('/user/myproduct')}}">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="{{url('/user/checkout')}}">Checkout</a></li>
                                            <li><a href="{{url('/user/cart')}}">Cart</a></li>
                                            <li class="active"><a href="login.html">Login</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{url('/user/blog')}}">Blog List</a></li>
                                            <li><a href="{{url('/user/blogdetail/1')}}">Blog Single</a></li>
                                        </ul>
                                    </li> 
                                    <li><a href="#">404</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="{{url('/user/search-advanced')}}">Search advanced</a></li>

                                </ul>
                            </div>
                        </div>
                        @if(Auth::check())

                        <form action="/user/search" method="GET"  id="searchForm">
                            @csrf
                            <div class="search_box pull-right">
                                <input type="text" name="search" placeholder="Search by name" id="searchInput" style="color: black;" required>
                                <button type="submit">Search</button>
                            </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </header>

        <script>
            $(document).ready(function() {
                $('#searchInput').on('keypress', function(e) {
                    if (e.which === 32 && $(this).val().length === 0) {
                //  chặn phím cách nếu input đang trống
                        e.preventDefault();
                    }
                });
            });
        </script>


    </body>
    <!--/Footer-->



