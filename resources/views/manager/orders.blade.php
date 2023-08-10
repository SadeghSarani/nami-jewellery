@extends('manager.layouts.master')

@section('content')

    <div class="container p-4 account-font" style="font-size: 10px">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <h5 class="pb-2 text-success">سفارشات </h5>
                    </div>
                </div>

                <div class="flow-up m-3 p-3 border" hidden></div>


                <div class="">
                    <div class="table-responsive">
                        <table class="table border table-responsive-xl">
                            <thead class="bg-info border">
                            <tr>
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
                            @foreach($orders as $item)
                                <tr>
                                    <td class="border"> {{ $i+=1 }}</td>
                                    <td class="text-info">{{$item->user->name}} {{$item->user->family}}</td>
                                    <td class="text-info">{{ $item->invoice_id }}</td>
                                    <input type="hidden" class="order-sending-id" value="{{ $item->id }}">
                                    <td class="border">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A, %d %B %Y')}}</td>
                                    <td class="border">{{ $item->invoice->total_price}}</td>
                                    <td class="border">
                                        <select class="form-select" id="order-status">
                                            @if($item->status == 'sending')
                                                <option value="new">جدید</option>
                                                <option value="sending" selected>در حال ارسال</option>
                                                <option value="sent">ارسال شده</option>
                                            @endif
                                            @if($item->status == 'posted')
                                                <option value="new">جدید</option>
                                                <option value="sending" >در حال ارسال</option>
                                                <option value="sent" selected>ارسال شده</option>
                                            @endif
                                            @if($item->status == 'new')
                                                <option value="new" selected>جدید</option>
                                                <option value="sending" >در حال ارسال</option>
                                                <option value="sent">ارسال شده</option>
                                            @endif
                                        </select>
                                    </td>

                                    <td class="details-link">
                                        <a href="{{route('getInvoiceDetails', $item->id)}}" target="_blank">
                                            <i class="fa fa-chevron-left text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script src="{{ asset('manager/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/jquery-3.4.1.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#order-status').change(function () {
                $.ajax({
                    url: "{{ route('order-update') }}",
                    method: "POST",
                    data: {
                        'id': $('.order-sending-id').val(),
                        'status': $(this).val()
                    }
                })
                location.reload();
            });
        });

    </script>

@endsection
