@extends('clients.layouts.master')

@section('content')
    <main class="main-content dt-sl mt-4 mb-3" style="transform: none;">
        <div class="container main-container" style="transform: none;">

            @if(session()->has('error'))
                <div style="padding-top:20px ">
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                </div>
            @endif


            <div id="cart-errors" class="alert alert-danger" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="icon-close" aria-hidden="true"></span>
                </button>
            </div>

            <div class="row" style="transform: none;">
                <div class="col-12" style="transform: none;">
                    <div class="tab-content" id="nav-tabContent" style="transform: none;">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab" style="transform: none;">
                            <div class="row" style="transform: none;">
                                <div class="col-xl-9 col-lg-8 col-12">
                                    <div class="row">
                                        <div class="col-md-12 px-0">
                                            <div class="table-responsive checkout-content dt-sl">
                                                <div class="checkout-header checkout-header--express">
                                                    <span class="checkout-header-title">({{$carts->count()}} عدد)</span>
                                                </div>
                                                <div class="container-fluid shop-list">
                                                    <form id="cart-update-form"
                                                          action="" method="POST">
                                                        <input type="hidden" name="_method" value="put"> <input
                                                            type="hidden" name="_token"
                                                            value="M4UHwO97NtyYd8Vv2bvMUdg7AWSnFTAwhcmDBeec">
                                                        @foreach($carts as $cart)
                                                            <div class="row list-row">
                                                                <div class="col-4 col-sm-3 col-md-2">
                                                                    <img class="img-fluid p-2"
                                                                         src="{{asset('storage/'.$cart->productItem->product->images[0])}}">>
                                                                </div>
                                                                <div class="col-8 col-sm-9 col-md-5 card-product-name">
                                                                    <a href="">
                                                                        <h3 class="title">{{$cart->productItem->product->fa_name}} {{$cart->productItem->product->en_name}}</h3>
                                                                    </a>
                                                                    <p class="detail">رنگ
                                                                        :{{$cart->productItem->color}}</p>
                                                                    <p class="detail">گارانتی
                                                                        : {{$cart->productItem->product->warranty}}</p>

                                                                </div>
                                                                <div
                                                                    class="col-4 col-sm-3 col-md-2 d-flex justify-content-center">
                                                                    <div class="counter-box">
                                                                        <div class="counter-box">
                                                                            <button type="button" class="inc"
                                                                                    id="inc-item-count"><i
                                                                                    class="bi bi-plus"
                                                                                    onclick="increaseQuantity({{ $cart->id }})"
                                                                                ></i></button>
                                                                            <span
                                                                                id="quantity_{{ $cart->id }}">{{$cart->count}}</span>
                                                                            <button type="button"
                                                                                    class="dec" id="desc-item-count"
                                                                                    onclick="decreaseQuantity({{ $cart->id }})"
                                                                            >
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" value="{{$cart->id}}"
                                                                           id="cart-id">
                                                                    <div style="margin-right: 3px">
                                                                        <button type="button" class="btn btn-danger"
                                                                                id="save-count"
                                                                                onclick="saveItem({{ $cart->id }})">
                                                                            ذخیره
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 col-sm-9 col-md-3">
                                                                    @if($cart->productItem->discount_percent != null || $cart->productItem->discount_percent != 0
)
                                                                        <strong class="cart-product-price"><span
                                                                                class="currency-suffix"></span> {{number_format($cart->productItem->price - ($cart->productItem->price * ($cart->productItem->discount_percent) / 100)) }}
                                                                            <span class="currency-suffix"> تومان</span></strong>
                                                                        <del class="text-danger old-cart-product-price">
                                                                            <span
                                                                                class="currency-suffix"></span>{{number_format($cart->productItem->price)}}
                                                                            <span class="currency-suffix"> تومان</span>
                                                                        </del>
                                                                    @else
                                                                        <strong class="cart-product-price"><span
                                                                                class="currency-suffix"></span> {{number_format($cart->productItem->price) }}
                                                                            <span class="currency-suffix"> تومان</span></strong>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </form>
                                                    <div>
                                                        {!! $carts->links() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="checkout-sidebar" class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar"
                                     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                    <div class="theiaStickySidebar"
                                         style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                                        <div class="dt-sn mb-2 details">
                                            <div class="checkout-summary-devider">
                                                <div></div>
                                            </div>
                                            <div class="checkout-summary-content">
                                                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                                <div class="checkout-summary-price-value">
                <span id="final-price" class="checkout-summary-price-value-amount">
                    {{number_format($total_price)}}
                </span>
                                                    تومان
                                                </div>
                                                <div class="checkout-summary-price-value">
                                                    <div class="checkout-summary-price-title">هزینه ارسال کالا:</div>

                                                    <span id="final-price" class="checkout-summary-price-value-amount">
                    60,000
                </span>
                                                    تومان
                                                </div>


                                                <div class="checkout-summary-price-value">
                                                    <div class="checkout-summary-price-title">مبلغ کل :</div>

                                                    <span id="final-price" class="checkout-summary-price-value-amount">
                    {{number_format(60000 + $total_price )}}
                </span>
                                                    تومان
                                                </div>
                                                <form
                                                    action="{{ route('payment', $total_price + env('SHIPPING_COST')) }}"
                                                    method="post">
                                                    <button name="cart_submit"
                                                            id="checkout-link" type="submit"
                                                            class="btn-primary-cm btn-with-icon w-100 text-center pr-0 checkout_link">
                                                        <i class="bi bi-arrow-right-square"></i>
                                                        ادامه ثبت سفارش
                                                    </button>
                                                </form>
                                                <div>
                <span>
                    کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.
                </span>
                                                    <span class="help-sn" data-toggle="tooltip" data-html="true"
                                                          data-placement="bottom" title=""
                                                          data-original-title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، فروشگاه ما هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                    <span class="mdi mdi-information-outline"></span>
                </span>
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
        <div id="modal">
            <div class="modal-content">
                <span class="close" id="closeButton">&times;</span>
                <h2 id="status-cart-action"></h2>
                <p id="message-cart-action"></p>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>

        $(document).ready(function () {
            $('#closeButton').click(function () {
                hideModal();
            })
        });

        function showModal() {
            $("#modal").fadeIn();
            $("body").addClass("modal-open");
        }

        function hideModal() {
            $("#modal").fadeOut();
            $("body").removeClass("modal-open");
        }

        function increaseQuantity(itemId) {
            var quantityElement = document.getElementById('quantity_' + itemId);
            var quantity = parseInt(quantityElement.innerText);
            quantity += 1;
            quantityElement.innerText = quantity;
        }

        function decreaseQuantity(itemId) {
            var quantityElement = document.getElementById('quantity_' + itemId);
            var quantity = parseInt(quantityElement.innerText);
            quantity -= 1;
            quantityElement.innerText = quantity;
        }

        function saveItem(itemId) {
            var quantityElement = document.getElementById('quantity_' + itemId);
            var quantity = parseInt(quantityElement.innerText);

            $.ajax({
                type: "POST",
                url: "{{ route('updateCart') }}",
                data: {
                    cartId: itemId,
                    itemCount: quantity
                },
                success: function (result) {
                    if (result.status === true) {
                        $('#status-cart-action').text('با موفیقیت انجام شد');
                        showModal();
                        location.reload();
                    } else {
                        $('#status-cart-action').text('با خطا مواجه شد');
                        showModal();
                        location.reload();
                    }
                }
            });
        }

    </script>
@endsection
