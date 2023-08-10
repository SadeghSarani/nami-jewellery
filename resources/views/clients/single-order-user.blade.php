@extends('clients.layouts.master')

@section('content')
    <main class="main-content dt-sl mt-4 mb-3" style="transform: none;">
        <div class="container main-container" style="transform: none;">
            <div class="row" style="transform: none;">

                <!-- Start Sidebar -->
            @include('component.sidebar-profile')
            <!-- End Sidebar -->

                <!-- Start Content -->
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">


                        <div class="col-12">
                            <div class="profile-navbar">
                                <h4>شماره سفارش<span
                                        class="font-en">{{$order->id}}</span><span>{{\Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %Y')}}</span>
                                </h4>
                            </div>
                        </div>


                        <div class="col-12 mb-4">
                            <div class="dt-sl dt-sn">
                                <div class="row table-draught px-3">
                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">تحویل گیرنده:</span>
                                        <span class="value">{{$user->name}} {{$user->family}}</span>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">شماره تماس تحویل گیرنده:</span>
                                        <span class="value">{{$user->phone_number}}</span>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">آدرس:</span>
                                        <span class="value">{{$user->addresses[0]->address}}</span>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">کد پستی:</span>
                                        <span class="value">{{$user->addresses[0]->postal_code}}</span>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">نحوه پرداخت:</span>
                                        <span class="value">پرداخت آنلاین</span>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">وضعیت پرداخت:</span>
                                        <span class="value">
                        {{$order->status}}
                                                            </span>

                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <span class="title">قیمت کل</span>
                                        <span class="value">{{$order->total_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>همه سفارش ها</h2>
                            </div>
                            <div class="dt-sl">
                                <div class="table-responsive">
                                    <table class="table table-order table-order-details">
                                        <thead>
                                        <tr>
                                            <th>نام محصول</th>
                                            <th>قیمت واحد</th>
                                            <th>قیمت کل</th>
                                            <th>قیمت نهایی</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($order->invoiceItems as $item)
                                            <tr>
                                                <td>{{$item->productItem->product->fa_name}}</td>
                                                <td>{{$item->productItem->price}}</td>
                                                <td>{{$item->productItem->price * $item->count}}</td>
                                                <td>{{$item->productItem->price * $item->count}}</td>
                                                <td>

                                                    <a href=""
                                                       class="btn btn-info mb-2">مشاهده</a>


                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
