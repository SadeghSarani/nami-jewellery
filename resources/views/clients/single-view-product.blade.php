@extends('clients.layouts.master')

@section('content')

    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <!-- Start Product -->
            <div class="dt-sn mb-3 dt-sl">
                <div class="row">
                    <!-- Product Gallery-->
                    <div class="col-lg-4 col-md-12 ps-relative">
                        <div class="product-gallery mt-3">
                            <div class="product-carousel owl-carousel owl-rtl owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1905px;">

                                        @foreach($product->images as $image)
                                            <div @if ($loop->iteration == 1) class="owl-item active"

                                                 @else class="owl-item" @endif style="width: 381px;">
                                                <div class="item">
                                                    <a class="gallery-item mt-3" href="{{ asset('storage/' . $image) }}"
                                                       data-fancybox="gallery" data-owl="one0">
                                                        <img src="{{ asset('storage/' . $image) }}"
                                                             alt="{{$product->fa_name}}"
                                                             class="animated fadeIn lazyLoadXT-completed">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev disabled"><i
                                            class="mdi mdi mdi-chevron-right"></i></button>
                                    <button type="button" role="presentation" class="owl-next"><i
                                            class="mdi mdi mdi-chevron-left"></i></button>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                            <hr class="border-product">
                            <ul class="product-thumbnails product-carousel owl-carousel carousel-products d-flex justify-content-center owl-rtl owl-loaded owl-drag">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 484px; padding-left: 1px; padding-right: 1px;">

                                        @foreach($product->images as $image)

                                            <div @if (in_array($loop->iteration, [1,2,3,4])) class="owl-item active"
                                                 @else class="owl-item"
                                                 @endif style="width: 86.333px; margin-left: 10px;">
                                                <li class="active">
                                                    <a href="#one0" class="owl-thumbnail" data-slide="0">
                                                        <img
                                                            src="{{ asset('storage/' . $image) }}"
                                                            alt="{{ $product->fa_name }}">
                                                    </a>
                                                </li>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev disabled"><i
                                            class="mdi mdi mdi-chevron-right"></i></button>
                                    <button type="button" role="presentation" class="owl-next"><i
                                            class="mdi mdi mdi-chevron-left"></i></button>
                                </div>
                                <div class="owl-dots disabled"></div>

                            </ul>
                        </div>
                        <br>
                        <table class="table table-active">
                            <h5 class="text-center"> ویژگی‌های محصول</h5>
                            <tbody>
                            @foreach($product->customField as $item)
                                <tr>
                                    <td class="text-center" style="background: #7eb9c0"><h4>@if($item->icon)
                                                <i style="color: white" class="{{$item->icon}}"></i>
                                            @else
                                                <i style="color: white" class="bi bi-check-circle-fill"></i>
                                            @endif</h4></td>
                                    <td><span> {{$item->key}}</span></td>
                                    <td><span>{{$item->value}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Product Info -->
                    <div class="col-lg-8 mt-3 col-md-12 pb-5 product-info-block">
                        <div class="product-info dt-sl">
                            <div class="product-title">
                                <h1>{{$product->fa_name}} - {{$product->en_name}}</h1>
                                <h3 class="mb-1">{{$product->en_name}}</h3>
                            </div>

                            <div class="row pt-2">
                                <div class="col-md-7 col-lg-7">
                                    <hr class="border-product-title">
                                    <div class="row mt-2">

                                    </div>
                                    <p class="little-des pt-0 mt-0">{{$product->description}}</p>
                                </div>
                                <div class="col-xl-4 col-md-5 col-sm-8 mx-sm-auto mx-0">
                                    <h6>
                                        لطفا رنگ موردنظر خودرا انتخاب کنید
                                    </h6>
                                    <div class="card box-card px-3 pb-3 pt-0">
                                        <div class="box-border"></div>

                                        <div class="product-variant dt-sl product-variant-color">
                                            <div
                                                class="section-title d-flex align-items-baseline text-sm-title no-after-title-wide mb-1">
                                                <span class="bi bi-cirrcle" style="color: black">رنگ ها</span>
                                            </div>
                                            <br>
                                            <ul class="product-variants float-right ml-3">
                                                @foreach($product->productItem as $item)
                                                    <li class="ui-variant product-attribute " title="">
                                                        <label class="ui-variant mb-0 ui-variant--color">
                                                        <span data-group-id="attributeGroup-1"
                                                              data-container="body" data-toggle="popover"
                                                              data-placement="bottom" data-trigger="hover"
                                                              class="ui-variant-shape"
                                                              style="background-color:{{$item->code_color}}"
                                                              data-original-title="" title=""></span>
                                                            <span style="color: black;margin-left: 15px">
                                                                {{$item->color}}
                                                            </span>
                                                            <input data-product="{{$product->fa_name}}"
                                                                   type="radio"
                                                                   value="{{$item->color}}"
                                                                   name="price_product"
                                                                   class="variant-selector"
                                                                   @if($loop->iteration == 1) checked @endif>

                                                            <div class="ui-variant--check">
                                                                <span></span>
                                                            </div>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                        <div class="product-variant dt-sl ">
                                            <div
                                                class="section-title d-flex align-items-baseline text-sm-title no-after-title-wide mb-1">
                                                <h2><span class=""><i class="bi bi-shield-check"></i></span></h2>
                                                <h2 class=" mb-0 mx-1 d-block" style="color: black">گارانتی: <span
                                                        id="attributeGroup-2"></span></h2>
                                            </div>
                                            <ul class="product-variants float-right ml-3">

                                                <li class="ui-variant product-attribute " title="">
                                                    <label class="ui-variant mb-0 ">

                                                        <input data-product=""
                                                               type="radio" value="" name=""
                                                               class="variant-selector" checked="">

                                                        <div class="ui-variant--check">
                                                            <span product-warranty-span="">{{$product->warranty}} ماه شرکتی</span>
                                                        </div>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <br>
                                        <div
                                            class="section-title d-flex align-items-baseline text-sm-title no-after-title-wide mb-1">
                                            <h2><span class=""><i class="bi bi-shop"></i></span></h2>
                                            <h2 class=" mb-0 mx-1 d-block" style="color: black">فروشنده: <span
                                                    id="attributeGroup-2"></span></h2>
                                            <h2 class=" mb-0 mx-1 d-block" style="color: black">فروشگاه نسیم ارتباط
                                                <span
                                                    id="attributeGroup-2"></span></h2>
                                        </div>
                                        <hr>
                                        <div class="dt-sl box-Price-number box-margin">
                                            <div class="mb-2 row">
                                                <div class="col-md-6">
                                                    <h5><span class="flex-grow-1 number"><span style="padding: 10px"><i
                                                                    class="bi bi-basket3"></i></span>تعداد</span></h5>
                                                </div>
                                                <div id="basket" class="col-md-6">
                                                    <button type="button" class="btn btn-danger  decrementButton">-
                                                    </button>
                                                    <span id="itemCount">1</span>
                                                    <button type="button" class="btn btn-success  incrementButton">+
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2 d-flex pt-3">
                                                <h5><span class=""><i class="bi bi-box"></i></span></h5>
                                                <h5 class=" mb-0 mx-1 d-block" style="color: black">موجودی: <span
                                                        id="attributeGroup-2"></span></h5>
                                                <h5><span id="quantity-product">0</span></h5>
                                            </div>
                                            <div class="section-title text-sm-title no-after-title-wide mb-0 dt-sl">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex justify-content-between mt-4">
                                                            <div class="text-price d-flex align-items-center">
                                                                قیمت
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 d-flex justify-content-end">
                                                                    <div class="discount show-discount mr-3 "
                                                                         id="discount">
                                                                        <del style="font-weight: bold" class="pt-3" id="price-discount">

                                                                        </del>
                                                                    </div>

                                                                    <div class="col-6" id="discount-show-1">
                                                                        <h6 style="display: inline-block;padding: 2px 8px;font-size: 12px; color: #fff;background: #ef0012;border-radius: 15px 15px 0 15px;width: 71px;height: 21px">
                                                                            <span id="discount-show"></span></h6>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 text-left">
                                                                      <span class="text-danger">
                                                                          <h3 id="price-main" class="pt-3"></h3>
                                                                      </span>
                                                                    <span class="currency">تومان</span>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="" class="input-product-item_id">
                                            <button style="" type="button" id="add-cart-btn"
                                                    class=" mt-4 w-100 btn btn-primary btn-with-icon add-to-cart btn-show-product">
                                                افزودن به سبد خرید
                                            </button>

                                            <div id="modal">
                                                <div class="modal-content">
                                                    <span class="close" id="closeButton">&times;</span>
                                                    <h2 id="status-cart-action"></h2>
                                                    <p id="message-cart-action"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product -->

        <div class="dt-sn mb-3 px-0 dt-sl pt-0">
            <!-- Start tabs -->
            <section class="tabs-product-info mb-3 dt-sl">
                <div class="ah-tab-content-wrapper product-info px-4 py-5 dt-sl">

                    <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                        <div class="section-title title-wide no-after-title-wide dt-sl">
                            <h2>ارسال دیدگاه</h2>
                        </div>

                        @if(Session::has('success'))
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <div class="alert alert-warning" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            </div>

                        @endif

                        @if(checkUserLogin())
                            <div class="form-question-answer dt-sl mb-3 comment--form">

                                <!-- start form -->
                                <form id="comments-form" action="{{ route('comment.create') }}" method="post">
                                    <input type="hidden" name="user_id" value="{{ checkUserLogin()->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <textarea class="form-control mb-3" rows="5" name="comment" required></textarea>
                                    <button type="submit" class="btn px-4 btn-info float-right ml-3 comment-submit-btn">
                                        ثبت
                                        دیدگاه
                                    </button>
                                </form>

                            </div>
                        @else
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <div class="alert alert-warning" role="alert">
                                    برای ارسال نظر باید وارد حساب کاربری شوید
                                </div>
                            </div>
                        @endif

                        <div class="comments-area default">

                            <div class="section-title text-sm-title title-wide no-after-title-wide mt-2 mb-0 dt-sl">
                                <p class="count-comment"> {{ $product->comments->count() }} دیدگاه</p>
                            </div>
                            <ol class="comment-list">
                                @foreach($product->comments as $comment)
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <cite class="fn">{{ $product->comments->first()->user->name . " " .  $product->comments->first()->user->family }}</cite>
                                                <div class="commentmetadata">
                                                    {{ verta($comment->created_at)->formatDate('Y-m-d') }}
                                                </div>
                                            </div>
                                            <p>{{ $comment->comment }}</p>

                                        </div>
                                    </li>
                                @endforeach

                            </ol>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End tabs -->
        </div>

    </main>

@endsection

@section('script')

    <script>

        $(document).ready(function () {

            $('input[name=price_product]').on('change', function () {
                var color = $(this).val();
                getProductPrice(color);
            });

            $('input[name=price_product]').prop('checked', function () {
                var color = $(this).val();
                getProductPrice(color);
            });

            $('#add-cart-btn').click(function () {
                var count = $('#itemCount').text();
                var product_item = $('.input-product-item_id').val();
                var product = {{$product->id}};

                addBasketItem(product_item, product, count);
            })


            var itemCount = 0;
            var itemCountElement = $('#itemCount');

            $(".decrementButton").click(function () {

                if (itemCount > 0) {
                    itemCount--;
                    itemCountElement.text(itemCount);
                }
            })

            $('.incrementButton').click(function () {

                itemCount++;
                itemCountElement.text(itemCount);
            })

            $('#closeButton').click(function () {
                hideModal();
            })

        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function showModal() {
            // Show the modal and overlay
            $("#modal").fadeIn();
            $("body").addClass("modal-open");
        }

        function hideModal() {
            // Hide the modal and overlay
            $("#modal").fadeOut();
            $("body").removeClass("modal-open");
        }


        function getProductPrice(color) {
            $.ajax({
                url: "{{route('price')}}",
                type: 'POST',
                data: {
                    data: {
                        product_id: '{{$product->id}}',
                        color: color,
                    }
                },
                success: function (data) {
                    var price = numberWithCommas(data.price)
                    $('#price-main').text(price);
                    $('#quantity-product').text(data.quantity);
                    $('.input-product-item_id').val(data.id);
                    if (data.discount_percent === null || data.discount_percent === 0 || data.discount_percent === false || data.discount_percent === "0") {
                        $('#discount').hide();
                        $('#discount-show-1').hide();
                    } else {
                        $('#discount').show();
                        $('#discount-show').text(data.discount_percent + '%' + ' ' + 'تخفیف');
                        var discountedPrice = numberWithCommas(data.price - (data.price * (data.discount_percent) / 100));
                        var price_discount = numberWithCommas(data.price)
                        $('#price-discount').text(price_discount);
                        $('#price-main').text(discountedPrice);
                    }
                }
            });
        }

        function addBasketItem(product_item, product, count) {
            $.ajax({
                url: "{{route('addCarts')}}",
                type: 'POST',
                data: {
                    data: {
                        product_item_id: product_item,
                        product_id: product,
                        count: count,
                    }
                },
                success: function (data) {
                    if (data.status === true) {
                        $('#status-cart-action').text('با موفیقیت انجام شد');
                        $('#message-cart-action').text('به سبد خرید شما اضافه شد');
                        showModal();
                    } else {
                        $('#status-cart-action').text('با خطا مواجه شد');
                        $('#message-cart-action').text('به سبد خرید شما اضافه نشد');
                        showModal();
                    }
                }
            });
        }

    </script>

@endsection
