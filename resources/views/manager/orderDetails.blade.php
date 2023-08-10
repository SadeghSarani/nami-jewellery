<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>صفحه فاکتور مشتری</title>
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
                            <img src="{{ asset('vendor/assets/img/logo.jpeg') }}" width="30%">
                        </div>

                        <div class="col-4 text-right">
                            <h6 class="text-secondary"> فروشگاه اینترنتی نسیم ارتباط</h6>
                        </div>

                        <div class="col-4 text-right">
                            <p class="font-weight-bold mb-1"><span
                                    class="text-muted">شماره فاکتور :  </span>{{ $invoice->id }}</p>
                            <p class="text"><span
                                    class="text-muted">تاریخ : </span> {{\Morilog\Jalali\Jalalian::forge($invoice->created_at)->format('%A, %d %B %Y') }}
                            </p>
                        </div>
                    </div>

                    <hr class="my-0">
                    <div class="row pb-5 p-5">
                        <div class="col-6">
                            <p class="font-weight-bold mb-4"><span class="text-muted"> اطلاعات گیرنده </span></p>
                            <p class="mb-1"><span
                                    class="text-muted"> نام و نام خانوادگی : {{$invoice->user->name}} - {{$invoice->user->family}} </span>
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted">شماره تلفن :  {{$invoice->user->phone}} </span>
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted">آدرس :  {{$invoice->user->addresses[0]->address}}</span>
                            </p>
                            <p class="mb-1"><span
                                    class="text-muted"> کد پستی : {{$invoice->user->addresses[0]->postal_code}} </span>
                            </p>
                        </div>

                        <div class="col-6 text-right">
                            <p class="font-weight-bold mb-4">جزییات پرداخت </p>
                            <p class="mb-1"><span class="text-muted">درگاه پرداخت : </span> زرین پال </p>
                            <p class="mb-1"><span
                                    class="text-muted">کد پیگیری پرداخت : {{$invoice->code_peyment}}</span>
                            </p>
                            <p class="mb-1"><span class="text-muted"> وضعیت :  </span>
                                @if($invoice->status == 'paid')
                                    پرداخت شده
                                @else
                                    پرداخت نشده
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>

                                <tr style="border-bottom: 1px solid #3e3939">
                                    <th class="border-1 text-uppercase small font-weight-bold">نام محصول</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">رنگ</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">تعداد</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">قیمت تکی (تومان)</th>
                                    <th class="border-1 text-uppercase small font-weight-bold">قیمت کلی (تومان)</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($invoice->invoiceItems as $item )
                                    <tr>
                                        <td>{{$item->productItem->product->fa_name}}</td>
                                        <td> {{$item->productItem->color}}</td>
                                        <td>{{$item->count}}</td>
                                        <td>{{$item->productItem->price}}</td>
                                        <td>{{$item->productItem->price * $item->count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-le">
                            <div class="mb-2">قیمت کل</div>
                            <h2> {{$invoice->total_price}}</h2>
                            <div class="h2 font-weight-light"> تومان</div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
