@php use App\Models\Shoonayik; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>

    body {
        background: grey;
        margin-top: 120px;
        margin-bottom: 120px;
    }
</style>
<body dir="rtl">

<div class="container">

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">

                    <div class="row p-5">

                        <div class="col-4">
                            <img src="{{ asset('images/logo/navbar-logo.jpg') }}" width="30%">
                        </div>

                        <div class="col-4 text-right">
                            <h6 class="text-secondary"> فروشگاه اینترنتی شونیاک</h6>
                        </div>

                        <div class="col-4 text-right">
                            <p class="font-weight-bold mb-1"><span
                                    class="text-muted">شماره فاکتور :  </span>{{ $invoice->order_id }}</p>
                            <p class="text"><span class="text-muted">تاریخ : </span> {{ $invoice->invoice_data }}</p>
                        </div>
                    </div>

                    <hr class="my-0">
                    <div class="row pb-5 p-5">
                        <div class="col-6">
                            <p class="font-weight-bold mb-4"><span class="text-muted"> اطلاعات گیرنده </span></p>
                            <p class="mb-1"><span
                                    class="text-muted"> نام و نام خانوادگی :  </span> {{ $user->information['full_name'] }}
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted">شماره تلفن :  </span> {{ $user->information['phone-number'] }}
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted">آدرس :  </span> {{ $user->information['city'] . " - " .  $user->information['exact-address'] }}
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted"> کد پستی :  </span> {{ $user->information['postcode'] }}
                            </p>
                        </div>

                        <div class="col-6 text-right">
                            <p class="font-weight-bold mb-4">جزییات پرداخت </p>
                            <p class="mb-1"><span class="text-muted">درگاه پرداخت : </span> زرین پال </p>
                            <p class="mb-1"><span
                                    class="text-muted">کد پیگیری پرداخت : </span> {{ is_null($invoice->payment_code) ? '' : $invoice->payment_code }}
                            </p>
                            <p class="mb-1"><span class="text-muted"> وضعیت :  </span>@if($invoice->status == "paid")
                                    پرداخت شده
                                @elseif($invoice->status == "Unpaid")
                                    پرداخت نشده
                                @endif </p>
                        </div>
                    </div>

                    @php $i = 0; @endphp
                    <div class="row p-5">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>

                                <tr style="border-bottom: 1px solid #3e3939">
                                    <th class="border-1 text-uppercase small font-weight-bold">#</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">نام محصول</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">رنگ</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">سایز</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">تعداد</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">قیمت (تومان)</th>
                                </tr>


                                </thead>
                                <tbody>
                                @foreach($invoice_items as $item )

                                    <tr>
                                        <td>{{ $i+=1 }}</td>
                                        <td> {{ $item->product_name }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->count }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-le">
                            <div class="mb-2">قیمت کل</div>
                            <div class="h2 font-weight-light"> {{ $invoice->total_price }} تومان</div>
                        </div>

                        <hr>

                        <div class="row pb-5 p-5">
                            <div class="col-6">
                                <p class="font-weight-bold mb-4">اطلاعات فروشگاه </p>
                                @foreach(Shoonayik::all() as $item)
                                    <p class="mb-1">{{ $item->name }} : {{ $item->data }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
