<html lang="fa">
<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('vendor/assets/img/logo.jpeg')}}" type="image/x-icon">

    <title>@yield('title')</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/materialdesignicons.min.css') }}">


    <!-- theme color file -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/bootstrap.min.css') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/bootstrap-rtl.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/toastr.css') }}/">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/main.css?v=3.1.1') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/custom.css') }}">


    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body>


@php
    $category = app(\App\Models\ProductCategory::class);
    $category_items = $category->all();
@endphp

<div class="wrapper ">


    <!-- Start header -->
    <header class="main-header dt-sl">

        <!-- Start topbar -->
        <div class="container main-container">
            <div class="topbar dt-sl">
                <div class="row align-items-center">

                </div>
            </div>
        </div>


        <!-- Start bottom-header -->
        <div class="bottom-header dt-sl mb-sm-bottom-header">
            <div class="container main-container">
                <!-- Start Main-Menu -->


                <nav class="main-menu dt-sl">
                    <ul class="list float-right hidden-md">
                        <li class="list-item">
                            <a>
                                <img src="{{asset('vendor/assets//img/logo.jpeg')}}" style="width: 50px">
                            </a>
                        </li>

                        <li class="list-item">
                            <a class="nav-link">فروشگاه نسیم ارتباط</a>
                        </li>

                        <li class="list-item">
                            <a class="nav-link" href="/">صفحه اصلی</a>

                        </li>


                        <li class="list-item list-item-has-children position-static">
                            <a class="nav-link" href="{{ route('allProducts') }}"><span>محصولات</span> <i class="bi bi-chevron-down"
                                                                                style="font-size: 10px"></i></a>

                            <ul class="f-menu sub-menu nv">
                                <li class="active">
                                    <div class="megadrop row">

                                        @foreach($category_items as $items)
                                            <a href="{{ route('get.product.withCategory', ['category_id' => $items->id]) }}">
                                                <div class="h5">{{ $items->name }}</div>
                                            </a>
                                           @foreach($items->productGroups as $item)
                                                <a href="{{ route('get.product-group-id', ['category_id' => $items->id, 'product_group_id' => $item->id]) }}">
                                                    <div class="h6">{{ $item->name }}</div>
                                                </a>
                                           @endforeach
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <!-- mega menu 5 column -->
                        <li class="list-item list-item-has-children menu-col-1">
                            <a class="nav-link" href="{{ route('blogs.index') }}">وبلاگ</a>
                        </li>


                        <li class="list-item list-item-has-children menu-col-1">
                            <a class="nav-link" href="{{ route('aboutUs') }}">درباره ما </a>
                        </li>

                        <li class="list-item list-item-has-children menu-col-1">
                            <a class="nav-link" href="{{ route('contactUs') }}">ارتباط با ما </a>
                        </li>


                    </ul>
                    <ul class="nav float-left">
                        <li class="nav-item" id="cart-list-item">
                            <a class="nav-link" href="{{route('getCarts')}}"
                               aria-expanded="false">
                                <span class="label-dropdown">سبد خرید</span>
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>
                        <!--start .author-author__info-->
                        <ul class="nav float-left">

                            <li class="nav-item account dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="label-dropdown"> حساب کاربری</span>
                                    <i class="bi bi-person-circle"></i>
                                </a>
                                @if(!checkUserLogin())
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                        <a class="dropdown-item" href="{{route('userLoginPage')}}">
                                            <i class="bi bi-person-up"></i>
                                            ورود به سایت
                                        </a>
                                        <a class="dropdown-item" href="{{route('UserSignInPage')}}">
                                            <i class="bi bi-person-vcard"></i>
                                            ثبت نام
                                        </a>
                                    </div>
                                @else
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                        <a class="dropdown-item" href="{{route('userProfilePage')}}">
                                            <i class="bi bi-person"></i>
                                            ورورد به حساب کاربری
                                        </a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </ul>

                    <button class="btn-menu">
                        <div class="align align__justify">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="side-menu">
                        <div class="logo-nav-res dt-sl text-center">
                            <a href="#">
                                <img width="55" alt="فروشگاه اینترنتی نسیم ارتباط"
                                     src="{{asset('vendor/assets//img/logo.jpeg')}}">
                            </a>
                        </div>
                        <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                            <form action="{{route('search-product')}}" method="post">
                                <input type="text" name="product_name" placeholder="نام محصول مورد نظر را وارد کنید...">
                                <i class="mdi mdi-magnify"></i>
                            </form>
                        </div>
                        <ul class="navbar-nav dt-sl">

                            <li>
                                <a href="{{ route('home') }}">صفحه اصلی</a>
                            </li>

                            <li class="sub-menu">
                                <a href="{{ route('home') }}">محصولات <i class="bi bi-chevron-down" style="padding-right: 65%"></i></a>

                                <ul>
                                    <li>
                                        <a class="text-nowrap" href="{{ route('allProducts') }}"><i class="mdi mdi-chevron-left"></i>همه موارد این دسته</a>
                                    </li>

                                    @foreach($category_items as $items)
                                        <li class="sub-menu">
                                            <a href="{{ route('get.product.withCategory', ['category_id' => $items->id]) }}"> {{ $items->name }}</a>
                                            <ul>
                                                <li>
                                                    <a class="text-nowrap" href="{{ route('allProducts') }}"><i class="mdi mdi-chevron-left"></i>همه موارد این دسته</a>
                                                </li>

                                                @foreach($items->productGroups as $item)
                                                    <li>
                                                        <a href="{{ route('get.product-group-id', ['category_id' => $items->id, 'product_group_id' => $item->id]) }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                            </li>
                            <li class="">
                                <a href="{{ route('blogs.index') }}">وبلاگ</a>
                            </li>
                            <li class="">
                                <a href="{{ route('aboutUs') }}">درباره ما</a>

                            </li>
                            <li class="">
                                <a href="{{ route('contactUs') }}">ارتباط با ما </a>

                            </li>

                        </ul>
                    </div>

                    <div class="overlay-side-menu"></div>
                </nav>
                <!-- End Main-Menu -->
            </div>
        </div>
        <!-- End bottom-header -->
    </header>
    <!-- End header -->
