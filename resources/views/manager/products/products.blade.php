@extends('manager.layouts.master')

@section('title')
    لیست محصولات
@endsection


@section('content')

    <div class="p-4 my-container" style="font-size: 12px;">

        @if(Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show p-3 m-3" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('delete'))
            <div class="alert alert-warning alert-dismissible fade show p-3 m-3" role="alert">
                {{ Session::get('delete') }}
            </div>
        @endif

        <h3 class="kt-portlet__head-title">
            <a href="{{ route('manager-product-create') }}"
               class="btn btn-brand btn-elevate btn-icon-sm">
                <i class="la la-plus"></i>
                <button class="btn btn-success">افزودن محصول جدید</button>
            </a>
        </h3>

        <!--begin: Datatable -->
        <table class="table table-bordered table-responsive-xl">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    نام محصول
                </th>
                <th>
                    قیمت
                </th>

                <th>
                    تصویر شاخص
                </th>

                <th>
                    تعداد موجودی انبار
                </th>
                <th>
                    عملیات
                </th>
            </tr>
            </thead>
            <tbody>
            @php $i = 0; @endphp

            @foreach($products as $item )

                <tr>
                    <td>
                        {{ isset($_GET['page']) ? ((($_GET['page'] - 1) * 15) + $i += 1) : $i += 1 }}
                    </td>
                    <td>
                        {{ $item->fa_name  . "  ( " . $item->en_name . " )"}}
                    </td>
                    <td>
                        @foreach($item->productItem()->get() as $productItem )
                            <p> {{ $productItem->color . " = ". $productItem->price . ' ' . 'تومان' }}</p>
                        @endforeach
                    </td>
                    <td>
                        @if(collect($item->images)->first() !== null)
                            <img
                                src="{{ asset("storage/" . collect($item->images)->first()) }}"
                                class="img-thumbnail" alt="Responsive image" width="150px" height="150px">
                        @endif
                    </td>

                    <td>
                        @foreach($item->productItem()->get() as $productItem )
                            <p> {{ $productItem->color . " = ". $productItem->quantity  }}</p>
                        @endforeach
                    </td>
                    <td>

                        <div class="row">

                            <a href="{{ route('manager.product.update.template', $item->id) }}"
                               class="btn btn-sm btn-success m-1 py-1 ">ویرایش</a>

                            <form method="POST" action="{{ route('manager.product.delete', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger mt-1" onclick="return confirm('آیا مطمئن هستید؟');"
                                        type="submit">حذف
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>

@endsection




