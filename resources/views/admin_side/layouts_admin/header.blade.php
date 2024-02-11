<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description"
        content="Welcome to Al Azhar General Trading LLC - Your Trusted Source for Quality Hardware Products in the UAE. Explore a wide range of hardware solutions for your needs.">
    <meta name="keywords" content="hardware, products, tools, equipment, Al Azhar General Trading LLC, UAE">
    <meta name="author" content="Nabeel Imrani - Website Developer">

    @stack('title')

    <link rel="icon" href="{{ asset('assets/fav.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('frontend/dist/css/adminlte.min.css') }}"> -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('frontend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dist/css/custom.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>


    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">Home</a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar ml-auto" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin-logout') }}">
                        <i class="fas fa-power-off"></i> <!-- Font Awesome power-off icon -->
                        <p>Logout</p>
                    </a>

                </li>
            </ul>

        </nav>




        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard') }}" class="brand-link d-flex align-items-center">
                <img src="{{ asset('assets/fav.png') }}" alt="al alzhar general trading llc"
                    class="img-fluid img-circle bg-light" width="50" height="50">
                <b class="brand-text font-weight-bold ml-3" style="font-size: 15px;"><b
                        style="font-size: 19px;">Kimbowny</b> Pet Shop</b>
            </a>


            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('frontend/dist/img/avatar3.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link {{ Request::is('admin/dashboard') ? 'active' : ' ' }}">
                                        <p>Home Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- setting -->


                </nav>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Entries
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.banner.index') }}"
                                    class="nav-link {{ Route::is('admin.banner.index') ? 'active' : '' }} ">
                                    <p>Add Banners</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.category.index') }}"
                                    class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }} ">
                                    <p>Add Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.color.index') }}"
                                    class="nav-link {{ Route::is('admin.color.index') ? 'active' : '' }} ">
                                    <p>Add Color</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.shape.index') }}"
                                    class="nav-link {{ Route::is('admin.shape.index') ? 'active' : '' }} ">
                                    <p>Add Shape</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.flavor.index') }}"
                                    class="nav-link {{ Route::is('admin.flavor.index') ? 'active' : '' }} ">
                                    <p>Add Flavor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pieces.index') }}"
                                    class="nav-link {{ Route::is('admin.pieces.index') ? 'active' : '' }} ">
                                    <p>Add Pieces</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.weight.index') }}"
                                    class="nav-link {{ Route::is('admin.weight.index') ? 'active' : '' }} ">
                                    <p>Add Weight</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.coupon.index') }}"
                                    class="nav-link {{ Route::is('admin.coupon.index') ? 'active' : '' }} ">
                                    <p>Add Coupon</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.faq.index') }}"
                                    class="nav-link {{ Route::is('admin.faq.index') ? 'active' : '' }} ">
                                    <p>Add Faq</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pet.index') }}"
                                    class="nav-link {{ Route::is('admin.pet.index') ? 'active' : '' }} ">
                                    <p>Add Pet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.size.index') }}"
                                    class="nav-link {{ Route::is('admin.size.index') ? 'active' : '' }} ">
                                    <p>Add Size</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.index') }}"
                                    class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }} ">
                                    <p>Add Product</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Listing
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.pending') }}"
                                    class="nav-link {{ Route::is('admin.orders.pending') ? 'active' : '' }} ">
                                    <p>Pending Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.canceled') }}"
                                    class="nav-link {{ Route::is('admin.orders.canceled') ? 'active' : '' }} ">
                                    <P>Canceled Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.completed') }}"
                                    class="nav-link {{ Request::is('admin.orders.completed') ? 'active' : ' ' }}">
                                    <p>Completed Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.banner.show') }}"
                                    class="nav-link {{ Route::is('admin.banner.show') ? 'active' : ' ' }}">
                                    <p>View Banners</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.category.show') }}"
                                    class="nav-link {{ Route::is('admin.category.show') ? 'active' : ' ' }}">
                                    <p>View Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.color.show') }}"
                                    class="nav-link {{ Route::is('admin.color.show') ? 'active' : ' ' }}">
                                    <p>View Color</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.shape.show') }}"
                                    class="nav-link {{ Route::is('admin.shape.show') ? 'active' : ' ' }}">
                                    <p>View Shape</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.flavor.show') }}"
                                    class="nav-link {{ Route::is('admin.flavor.show') ? 'active' : ' ' }}">
                                    <p>View Flavor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pieces.show') }}"
                                    class="nav-link {{ Route::is('admin.pieces.show') ? 'active' : ' ' }}">
                                    <p>View Pieces</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.weight.show') }}"
                                    class="nav-link {{ Route::is('admin.weight.show') ? 'active' : ' ' }}">
                                    <p>View Weight</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.coupon.show') }}"
                                    class="nav-link {{ Route::is('admin.coupon.show') ? 'active' : ' ' }}">
                                    <p>View Coupon</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.faq.show') }}"
                                    class="nav-link {{ Route::is('admin.faq.show') ? 'active' : ' ' }}">
                                    <p>View Faq</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pet.show') }}"
                                    class="nav-link {{ Route::is('admin.pet.show') ? 'active' : ' ' }}">
                                    <p>View Pet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.size.show') }}"
                                    class="nav-link {{ Route::is('admin.size.show') ? 'active' : ' ' }}">
                                    <p>View Size</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.show') }}"
                                    class="nav-link {{ Route::is('admin.product.show') ? 'active' : ' ' }}">
                                    <p>View Product</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.profile') }}"
                                    class="nav-link {{ Route::is('admin.profile') ? 'active' : '' }} ">
                                    <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('logout*') ? 'active' : ' ' }}"
                                    href="{{ url('admin-logout') }}">
                                    <p>Logout</p>
                                </a>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
