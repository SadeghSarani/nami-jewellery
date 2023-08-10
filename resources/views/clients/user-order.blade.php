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
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>همه سفارش ها</h2>
                            </div>
                            <div class="dt-sl">
                                <div class="table-responsive">
                                    <table class="table table-order">
                                        <thead>
                                        <tr>
                                            <th>شماره سفارش</th>
                                            <th>تاریخ ثبت سفارش</th>
                                            <th>مبلغ کل</th>
                                            <th>وضعیت پرداخت:</th>
                                            <th>جزییات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="text-info">{{$order->id}}</td>
                                                <td>{{\Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %Y')}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>
                                                    <span class="text-danger"> {{trans(("messages.$order->status"))}} </span>
                                                </td>
                                                <td class="details-link">
                                                    <a href="{{route('getOneOrder', $order)}}">
                                                        <i class="bi bi-chevron-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-3">
                        <div>{!! $orders->links() !!}</div>
                    </div>

                </div>
                <!-- End Content -->

            </div>

        </div>
    </main>@endsection
