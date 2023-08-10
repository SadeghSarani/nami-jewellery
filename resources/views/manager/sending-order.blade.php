@php use App\Http\Controllers\Manager\UserController;use App\Models\Cart;use App\Models\Order;use App\Models\OrderItem;use App\Models\Product;use App\Models\Sending;use App\Models\User; @endphp
@extends('manager.layouts.master')

@section('title')
    سفارشات درحال ارسال
@endsection

@section('content')

    <div class="container p-4 account-font" style="font-size: 10px">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <h5 class="pb-2 text-success">سفارشات درحال ارسال </h5>
                    </div>

                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <button class="btn btn-info btn-elevate btn-icon-sm add-flow-up mx-5 ">افزودن / ویرایش کد رهگیری</button>
                    </div>

                </div>

                <div class="flow-up m-3 p-3 border" hidden></div>


                <div class="">
                    <div class="table-responsive">
                        <table class="table border table-responsive-xl">
                            <thead class="bg-info border">
                            <tr>
                                <th class="border">#</th>
                                <th class="border">کاربر</th>
                                <th class="border">شماره سفارش</th>
                                <th class="border">کد رهگیری</th>
                                <th class="border">تاریخ ثبت سفارش</th>
                                <th class="border">مبلغ کل</th>
                                <th class="border">وضعیت :</th>
                                <th class="border">جزییات</th>

                            </tr>
                            </thead>
                            @php $i = 0;  @endphp
                            <tbody>
                            @foreach($sending as $item)
                                <tr>
                                    <td class="border"> {{ $i+=1 }}</td>
                                    <td class="text-info">{!! UserController::getUserfullName($item->user_id) !!}</td>
                                    <td class="text-info">{{ $item->order_id }}</td>
                                    <td class="text">{{ $item->tracking_code }}</td>
                                    <input type="hidden" class="order-sending-id" value="{{ $item->id }}">
                                    <td class="border">{{ $item->created_at }}</td>
                                    <td class="border">{{ Order::find($item->order_id)->total_price}}</td>

                                    <td class="border">
                                        <select class="form-select" id="order-status" >
                                            <option value="new">جدید</option>
                                            <option value="sending" selected>در حال ارسال</option>
                                            <option value="sent">ارسال شده</option>
                                        </select>
                                    </td>

                                    <td class="details-link">
                                        <a href="{{ route('get.manager.invoice', $item->order_id) }}" target="_blank">
                                            <i class="fa fa-chevron-left text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $sending->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <!-- jQuery -->
    <script src="{{ asset('manager/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/jquery/jquery/jquery-3.6.3.min.js') }}"></script>

    <script>

        $(document).ready(function () {


            $('#order-status').change(function () {

                $.ajax({
                    url: "{{ route('order.sending.status') }}",
                    method: "POST",
                    data: {
                        'id': $('.order-sending-id').val(),
                        'status': $(this).val()
                    }
                })
                location.reload();
            });

            $('.add-flow-up').click(function () {
                $('.flow-up').removeAttr('hidden');
                $('.flow-up').html('<div class="w-100 p-1" style="margin: auto; font-size: 12px !important;"><form method="POST" action="{{ route('add-tracking-code') }}" accept-charset="UTF-8"><div class="row p-3"><div class="form-group px-2"><label for="">شماره سفارش :</label><input class="form-control m-input col-md-12" required name="order_id" type="text"></div><div class="form-group"><label for="">کد رهگیری :</label><input class="form-control m-input col-md-12" required name="tracking_code" type="text"></div></div><div class="form-group"><button type="submit" class="btn btn-primary m-2"> ثبت</button></div></form></div>')
            })

        });

    </script>

@endsection
