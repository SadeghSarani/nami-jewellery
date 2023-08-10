@extends('clients.layouts.master')

@section('title')
    فروشگاه اینترنتی نسیم ارتبط
@endsection

@section('content')
    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3">

        <div class="container main-container">

            <!-- Start Main-Slider -->
            <div class="row index-main-slider mb-3 ">

                <div class="col-lg-12 col-md-12 order-1">
                    <!-- Start main-slider -->
                    <section id="main-slider"
                             class="main-slider main-slider-cs mt-1 carousel slide carousel-fade card hidden-sm"
                             data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#main-slider" data-slide-to="0" class=""></li>
                            <li data-target="#main-slider" data-slide-to="2" class="active"></li>
                        </ol>

                        <div class="carousel-inner">

                            @foreach ($slider as $item)
                                <div
                                    @if ($loop->iteration == 1) class="carousel-item active"
                                    @else class="carousel-item" @endif>
                                    <a class="main-slider-slide" href="">
                                        <img style="min-height: 400px" src="{{ asset('storage/' . $item->image) }}"
                                             alt="" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                            <i class="bi bi-chevron-compact-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider" data-slide="next">
                            <i class="bi bi-chevron-compact-left"></i>
                        </a>
                    </section>

                    <section id="main-slider-res" class="main-slider carousel slide carousel-fade card d-none show-sm"
                             data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#main-slider-res" data-slide-to="0" class="active"></li>
                            <li data-target="#main-slider-res" data-slide-to="1" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($slider as $item)
                                <div @if ($loop->iteration == 1) class="carousel-item active"
                                     @else class="carousel-item" @endif>
                                    <a class="main-slider-slide">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                            <i class="bi bi-chevron-compact-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                            <i class="bi bi-chevron-compact-left"></i>
                        </a>
                    </section>
                    <!-- End main-slider -->
                </div>
            </div>

            <!-- Start Category-Section -->
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="category-section dt-sn dt-sl">

                        <div class="category-section-title dt-sl">
                            <h3>دسته بندی محصولات</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product?category_id=1" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/mobile.png') }}" alt="گوشی موبایل"
                                                 src="{{ asset('/vendor/assets/img/phone.webp') }}"
                                                 width="150"
                                                 class="animated fadeIn lazyLoadXT-completed" style="min-height: 150px">
                                            <h5 class="pt-2 text-center " style="color: #625f5f !important;">گوشی موبایل</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product?category_id=3" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/4.png') }}" alt="تبلت"
                                                 src="{{ asset('vendor/assets/img/tablet.jpg') }}"
                                                 width="150"
                                                 class="animated fadeIn lazyLoadXT-completed" style="min-height: 150px">
                                            <h4 class="pt-2 text-center" style="color: #625f5f !important;">تبلت</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product?category_id=2" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/5.png') }}"
                                                 alt="لوازم جانبی"
                                                 src="{{ asset('vendor/assets/img/5.png') }}"
                                                 width="150" class="animated fadeIn lazyLoadXT-completed"
                                                 style="min-height: 150px">
                                            <h4 class="pt-2 text-center" style="color: #625f5f !important;">لوازم جانبی</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product/get/2/16" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/4545-2.png.png') }}" alt="کامپیوتر"
                                                 src="{{ asset('vendor/assets/img/4.png') }}"
                                                 width="150"
                                                 class="animated fadeIn lazyLoadXT-completed" style="min-height: 150px">
                                            <h4 class="pt-2 text-center" style="color: #625f5f !important;">هدفون و هنذفری</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product/get/2/17" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/4545-2.png') }}" alt="کامپیوتر"
                                                 src="{{ asset('vendor/assets/img/4545-2.png') }}"
                                                 width="150"
                                                 class="animated fadeIn lazyLoadXT-completed" style="min-height: 150px">
                                            <h4 class="pt-2 text-center" style="color: #625f5f !important;">ساعت هوشمند</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col move-up">
                                    <div class="item">
                                        <a href="https://nasimertebat.com/product/get/2/18" class="promotion-category">
                                            <img data-src="{{ asset('vendor/assets/img/laptop.png') }}" alt="کامپیوتر"
                                                 src="{{ asset('vendor/assets/img/11.png') }}"
                                                 width="150"
                                                 class="animated fadeIn lazyLoadXT-completed" style="min-height: 150px">
                                            <h4 class="pt-2 text-center" style="color: #625f5f !important;">اسپیکر</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End Category-Section -->

            <!-- Start special products -->
            <section class="slider-section mb-3 amazing-section" style="background: #040849">
                <div class="container main-container">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-xs-12">
                            <div
                                class="product-carousel carousel-lg owl-carousel owl-theme owl-rtl owl-loaded owl-drag">


                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1880px;">
                                        <div class="owl-item active" style="width: 303.25px; margin-left: 10px;">
                                            <div class="item">
                                                <div class="amazing-product text-center pt-5">
                                                    <a href="/product/specials">
                                                        <img src="{{ asset('vendor/assets/img/amazing-1.png') }}"
                                                             alt="pecial products">
                                                    </a>

                                                    <a href="https://nasimertebat.com/product?special=true"
                                                       class="view-all-amazing-btn">
                                                        مشاهده همه
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($special_offers as $item)
                                            <div @if (in_array($loop->iteration, [1, 2, 3])) class="owl-item active"
                                                 @else class="owl-item" @endif
                                                 style="width: 303.25px; margin-left: 10px;">
                                                <div class="item">
                                                    <div class="product-card mb-3 prdocut-card-mobile">
                                                        <div class="product-head">
                                                            <div class="rating-stars">
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </div>

                                                        </div>

                                                        <a class="product-thumb"
                                                           href="{{route('singleProduct', $item->id)}}">
                                                            <img
                                                                src="{{ $item->base_image ?  asset('storage/'. $item->base_image) : asset('storage/'. collect($item->images)->first())}}"
                                                                alt="{{ $item->fa_name }}"
                                                                class="animated fadeIn lazyLoadXT-completed">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a
                                                                    href="{{route('singleProduct', $item->id)}}">{{ $item->fa_name . ' ( ' . $item->en_name . ' ) ' }}</a>
                                                            </h5>
                                                            <a class="product-meta"
                                                               href="">{{ $item->productGroup->name }}</a>


                                                            <div class="product-prices-div">
                                                                @if( in_array($item->productItem->first()->discount_percent, [null, 0, false]))
                                                                    <span class="product-price pt-5">
                                                                       {{ number_format($item->productItem->first()->price) }} تومان
                                                                    </span>
                                                                @else
                                                                    <div
                                                                        class="px-1 radius-large d-flex ai-center jc-center bg-p-700"
                                                                        style="background: red;border-radius: 32px;width: 90px;font-weight: bold;">
                                                                        <span class="text-body2-strong"
                                                                              style="color: white">{{$item->productItem->first()->discount_percent}}% تخفیف </span>
                                                                    </div>
                                                                    <del class="pt-3" id="price-discount"
                                                                         style="color: red">{{number_format($item->productItem->first()->price)}}
                                                                        تومان
                                                                    </del>
                                                                    <span class="product-price">
                                                                           {{ number_format($item->productItem->first()->price - (($item->productItem->first()->discount_percent * $item->productItem->first()->price) / 100)) }} تومان
                                                                    </span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End special products -->

            <!-- Start Banner -->
            <div class="row mt-3 mb-3">
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="">
                            <img data-src="/uploads/banners/6269148d8b4af_1651053709.jpg" alt=""
                                 src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="">
                            <img data-src="/uploads/banners/6269147f56c42_1651053695.jpg" alt=""
                                 src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="">
                            <img data-src="/uploads/banners/62e12b308df52_1658923824.jpg" alt=""
                                 src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="">
                            <img data-src="/uploads/banners/62e12b3e1378a_1658923838.jpg" alt=""
                                 src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Banner -->


            <<!doctype html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <body>

            </body>
            </html>
            <!-- Start special products -->
            <section class="slider-section mb-3 amazing-section" style="background: #6569ab">

                <div class="container main-container">
                    <div class="row mb-3">

                        <div class="col-lg-12 col-xs-12">
                            <div
                                class="product-carousel carousel-lg owl-carousel owl-theme owl-rtl owl-loaded owl-drag">


                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1880px;">
                                        <div class="owl-item active" style="width: 303.25px; margin-left: 10px;">
                                            <div class="item">
                                                <div class="amazing-product text-center pt-5">
                                                    <a href="/product/specials">
                                                        <img src="{{ asset('vendor/assets/img/amazing-2.png') }}"
                                                             alt="pecial products">
                                                    </a>

                                                    <a href="https://nasimertebat.com/product?most_sold=true"
                                                       class="view-all-amazing-btn">
                                                        مشاهده همه
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($special_offers as $item)
                                            <div @if (in_array($loop->iteration, [1, 2, 3])) class="owl-item active"
                                                 @else class="owl-item" @endif
                                                 style="width: 303.25px; margin-left: 10px;">
                                                <div class="item">
                                                    <div class="product-card mb-3 prdocut-card-mobile">

                                                        <div class="product-head">
                                                            <div class="rating-stars">
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </div>
                                                        </div>
                                                        <a class="product-thumb"
                                                           href="{{route('singleProduct', $item->id)}}">
                                                            <img class="prdocut-card-mobile-img"
                                                                 src="{{  $item->base_image ?  asset('storage/'. $item->base_image) : asset('storage/'. collect($item->images)->first())}}"
                                                                 alt="{{ $item->fa_name }}"
                                                                 class="animated fadeIn lazyLoadXT-completed">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a
                                                                    href="{{route('singleProduct', $item->id)}}">{{ $item->fa_name . ' ( ' . $item->en_name . ' ) ' }}</a>
                                                            </h5>
                                                            <a class="product-meta"
                                                               href="">{{ $item->productGroup->name }}</a>


                                                            <div class="product-prices-div">
                                                                @if( in_array($item->productItem->first()->discount_percent, [null, 0, false]))
                                                                    <span class="product-price pt-5">
                                                                       {{ number_format($item->productItem->first()->price) }} تومان
                                                                    </span>
                                                                @else
                                                                    <div
                                                                        class="px-1 radius-large d-flex ai-center jc-center bg-p-700"
                                                                        style="background: red;border-radius: 32px;width: 43px;font-weight: bold;">
                                                                        <span class="text-body2-strong"
                                                                              style="color: white">{{$item->productItem->first()->discount_percent}}%</span>
                                                                    </div>
                                                                    <del class="pt-3" id="price-discount"
                                                                         style="color: red">{{number_format($item->productItem->first()->price)}}
                                                                        تومان
                                                                    </del>
                                                                    <span class="product-price">
                                                                           {{ number_format($item->productItem->first()->price - (($item->productItem->first()->discount_percent * $item->productItem->first()->price) / 100)) }} تومان
                                                                    </span>
                                                                 @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End special products -->


            <!-- services -->
            <div class="bk-icons-footer mb-3">
                <div class="footer-services">
                    <div class="row">
                        <div class="service-item col">
                            <a>
                                <img data-src="{{ asset('vendor/assets/img/603a066de9e7a_1614415469.svg') }}">
                            </a>
                            <p>کالای اصل</p>
                        </div>
                        <div class="service-item col">
                            <a>
                                <img data-src="{{ asset('vendor/assets/img/603a065a2f4a6_1614415450.svg') }}">
                            </a>
                            <p>پشتیبانی قوی</p>
                        </div>
                        <div class="service-item col">
                            <a>
                                <img data-src="{{ asset('vendor/assets/img/603a0640caf35_1614415424.svg') }}">
                            </a>
                            <p>ارسال سریع کالا</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End services -->


            <!-- Start posts -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <section class="slider-section dt-sl mb-3">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide no-after-title-wide">
                                    <h2>آخرین نوشته های وبلاگ</h2>
                                    <a href="{{ route('blogs.index') }}">مشاهده همه</a>
                                </div>
                            </div>

                            <div class="col-12 px-res-0">
                                <div
                                    class="product-carousel carousel-md owl-carousel owl-theme posts-widget-owl owl-rtl owl-loaded owl-drag">


                                    <div class="owl-stage-outer">

                                        <div class="owl-stage"
                                             style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2246px;">

                                            @foreach ($blogs as $blog)
                                                <div @if (in_array($loop->iteration, [1, 2, 3])) class="owl-item active"
                                                     @else class="owl-item" @endif
                                                     style="width: 310.75px; margin-left: 10px;">

                                                    <div class="item">
                                                        <div class="post-card mb-0">
                                                            <div class="post-thumbnail">
                                                                <a
                                                                    href="{{ route('blog.single', base64_encode($blog->id)) }}">
                                                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                                                         alt="{{ $blog->subject }}">
                                                                </a>
                                                            </div>
                                                            <div class="post-title">
                                                                <a
                                                                    href="{{ route('blog.single', base64_encode($blog->id)) }}">{{ $blog->subject }}</a>
                                                                <span
                                                                    class="post-date">{{ verta($blog->created_at)->format('Y.m.d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End posts -->

        </div>
    </main>
@endsection
