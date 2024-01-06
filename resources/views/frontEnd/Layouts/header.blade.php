<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://webjior.in/kimbowny_01/assets/img/icon.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    @stack('title')
    <title>Kimbowny Co.</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/main.css') }}">


    <style>
        /* Add your custom styles here if needed */
        .cart {
            text-decoration: none;
            color: #fff;
        }

        .cart-icon {
            font-size: 20px;
            position: relative;
        }

        .badge {
            font-size: 10px;
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .cart-info {
            display: none;
            position: absolute;
            background: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1;
            text-align: left;
            width: 300px;

            transform: translateX(-50%);
        }

        .cart:hover .cart-info {
            display: block;
        }

        .product-image {
            max-width: 30%;
            height: auto;
        }

        .product-details {
            flex-grow: 1;
            margin-left: 10px;
            /* Add some space between image and details */
        }

        .quantity,
        .price {
            display: inline-block;
            margin-bottom: 5px;
            /* Add some space between quantity and price */
        }



        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .add-to-cart-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-icon {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #fff;
        }
    </style>
</head>

<body>

    <header class="header_area sticky-header ">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box bg-dark">
                <div class="container">

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"><a class="navbar-brand logo_h"
                            href="{{ route('home') }}"><img
                                src="https://webjior.in/kimbowny_01/assets/img/logo-light.webp" alt=""></a>

                    </nav><button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link text-white"
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item submenu dropdown"><a href="#"
                                    class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link " href="{{ route('shop.category') }}">Shop
                                            Category</a></li>
                                    <li class="nav-item"><a class="nav-link " href="{{ route('shop.single') }}">Product
                                            Details</a></li>
                                    <li class="nav-item"><a class="nav-link " href="{{ route('checkout') }}">Product
                                            Checkout</a></li>
                                    <li class="nav-item"><a class="nav-link " href="{{ route('shop.cart') }}">Shopping
                                            Cart</a></li>
                                    <li class="nav-item"><a class="nav-link "
                                            href="{{ route('conformation') }}">Confirmation</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown"><a href="#"
                                    class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link " href="{{ route('blog.view') }}">Blog</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link " href="{{ route('singleblog') }}">Blog
                                            Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown"><a href="#"
                                    class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    @if (!auth()->check())
                                        <li class="nav-item"><a class="nav-link "
                                                href="{{ route('login') }}">Login</a></li>
                                        <li class="nav-item"><a class="nav-link "
                                                href="{{ route('register') }}">Register</a></li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('tracking') }}">Tracking</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link "
                                            href="{{ route('element') }}">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link text-white"
                                    href="{{ route('contact') }}">Contact</a></li>
                            @if (auth()->check())
                                < !-- User is authenticated, show username and logout button -->
                                    <li class="nav-item submenu dropdown"><a href="#"
                                            class="nav-link dropdown-toggle " data-toggle="dropdown" role="button"
                                            aria-haspopup="true"
                                            aria-expanded="false">{{ auth()->user()->firstname }}
                                            {{ auth()->user()->lastname }}</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link " href="">My
                                                    Profile </a></li>
                                            <li class="nav-item"><a class="nav-link " href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">@csrf </form>
                                            </li>
                                        </ul>
                                    </li>
                            @endif
                        </ul>
                        <ul class="nav navbar-nav navbar-right ">
                            <li class="nav-item">
                                <a href="#" class="cart">
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-cart text-white"></i>
                                        <!-- Font Awesome shopping cart icon -->
                                        <sup class="badge badge-primary">2</sup>
                                    </span>
                                    <div class="cart-info">
                                        <!-- Product 1 -->
                                        <div class="cart-item">
                                            <img src="{{ asset('frontEnd/img/product/p2.jpg') }}" alt="Product Image"
                                                class="product-image">
                                            <div class="product-details">
                                                <p>
                                                    <span class="quantity">Quantity: 2</span>
                                                    <span class="price">Price: $20.00</span>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Product 2 -->
                                        <div class="cart-item">
                                            <img src="{{ asset('frontEnd/img/product/p2.jpg') }}" alt="Product Image"
                                                class="product-image">
                                            <div class="product-details">
                                                <p>
                                                    <span class="quantity">Quantity: 2</span>
                                                    <span class="price">Price: $20.00</span>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Additional products can be dynamically added here in the same format -->

                                        <!-- Cart footer with Add to Cart button -->
                                        <div class="card-footer">
                                            <button class="add-to-cart-button btn-block">Add to Cart</button>
                                        </div>
                                    </div>
                                </a>
                            </li>


                            <li class="nav-item"><button class="search search-icon "><span
                                        class="lnr lnr-magnifier text-white" id="search"></span></button></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between"><input type="text" class="form-control"
                        id="search_input" placeholder="Search Here"><button type="submit"
                        class="btn"></button><span class="lnr lnr-cross" id="close_search"
                        title="Close Search"></span></form>
            </div>
        </div>
    </header>
    <div class="preloader-wrap">
        <div class="preloader">
            <div class="dog-head"></div>
            <div class="dog-body"></div>
        </div>
    </div>
