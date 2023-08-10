<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('manager/dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('manager/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('manager/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('manager/dist/css/custom-style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/account-styles.css') }}">


    <script src="{{ asset('manager/plugins/jquery/jquery/jquery-3.6.3.min.js') }}"></script>

    <script src="{{ asset('js/lib/jquery-1.12.2.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- ssi-uploader -->
    <link href="{{ asset('manager/ssi-uploader/dist/ssi-uploader/styles/ssi-uploader.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('manager/ssi-uploader/dist/ssi-uploader/js/ssi-uploader.min.js') }}"></script>

    <style>

        @media screen and (min-width: 992px) {
            .my-nav {
                display: none;
            }
        }

    </style>
    @yield('style')
</head>
<body class="hold-transition sidebar-mini" id="body-sidbar">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-light navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"
                                                                       style="font-size: 22px; color: black"></i></a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <!-- Brand Logo -->

        <nav class="main-header navbar navbar-expand bg-dark navbar-dark border-bottom my-nav">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"
                                                                           style="font-size: 22px; color: white"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr; font-size: 12px">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('manager/dist/img/765-default-avatar-1.png') }}"
                             class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">کاربر ادمین</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('manager.manager') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>داشبورد</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('list.user') }}" class="nav-link">
                                <i class="fa fa-users nav-icon"></i>
                                <p>لیست کاربران </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('blog.list') }}" class="nav-link">
                                <i class="fa fa-file-text nav-icon"></i>
                                <p>وبلاگ</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>
                                    محصولات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('products.list') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p> محصولات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('product.categories') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دسته بندی محصولات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('product.groups.template') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گروه محصولات</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item treeview">

                            <a href="" class="nav-link">
                                <i class="fa fa-shopping-bag nav-icon"></i>
                                <p>
                                    سفارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="new-order" href="{{route('getNewOrders')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p> سفارشات جدید</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a id="sending-order" href="{{route('getSendingOrders')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سفارشات درحال ارسال</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a id="posted-order" href="{{route('getPostedOrder')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سفارشات ارسال شده</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('manager.slider') }}" class="nav-link">
                                <i class="fa fa-picture-o nav-icon"></i>
                                <p>مدیریت اسلایدر ها</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact-us.list') }}" class="nav-link">
                                <i class="fa fa-telegram nav-icon"></i>
                                <p>پیغام ها</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>خروج</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">

{{--        <script src="{{asset('manager/dist/js/sidebarSelector.js')}}"></script>--}}
