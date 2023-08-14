@extends('manager.layouts.master')

@section('title')

    گروه محصولات
@endsection

@section('content')

    <div class="p-5" style="font-size: 12px !important;">

        @if(Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <h3 class="m-2 p-2" id="add-bt">
            <button class="btn btn-success btn-elevate btn-icon-sm add-category" style="font-size: 12px !important;">
                <i class="fa fa-plus p-1"></i>
                افزودن
            </button>
        </h3>

        <h3 class="m-2 p-2" id="close-bt" hidden>
            <button class="btn btn-danger btn-elevate btn-icon-sm add-category" style="font-size: 12px !important;">
                <i class="fa fa-close p-1"></i>
                بستن
            </button>
        </h3>

        <div class="category m-3 p-3 border" hidden></div>

        <!--begin: Datatable -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th> #</th>
                <th>گروه محصولات</th>
                <th>نام دسته بندی</th>
                <th>عملیات</th>
            </tr>
            </thead>

            @php $i = 0 @endphp
            <tbody>
            @foreach($productGroup as $item)
                <tr>
                    <td>
                        {{ isset($_GET['page']) ? ((($_GET['page'] - 1) * 15) + $i += 1) : $i += 1 }}
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->category->name }}
                    </td>

                    <td>
                        <div class="row">
                            <form method="POST" class="px-1" action="{{ route('product.groups.delete', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger py-1 "
                                        onclick="return confirm('آیا مطمئن هستید؟');"
                                        type="submit">حذف
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('script')

    <!-- jQuery -->
    <script src="{{ asset('manager/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/jquery/jquery/jquery-3.6.3.min.js') }}"></script>

    <script>

        $(document).ready(function () {

            $('.add-category').click(function () {
                $('.category').removeAttr('hidden');
                $('.category').html('<div class="w-100 p-1" style="margin: auto; font-size: 12px !important;"><form enctype="multipart/form-data" method="POST" action="{{ route('product.groups.create') }}" accept-charset="UTF-8"><div class="row p-3"><div class="form-group"><label for="">گروه محصولات :</label><input class="form-control m-input col-md-12" required name="name" type="text"></div><div class="row" style="margin-right:10px"><div class="form-group"><label for="">عکس گروه محصول :</label><input class="form-control m-input col-md-12" required name="file" type="file"></div><div class="form-group" style="margin-right: 1% !important;"><label for="Grouping">دسته بندی :</label><select class="form-control" name="product_category_id" aria-label="Default select example">@foreach($category as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></div></div><div class="form-group"><button type="submit" class="btn btn-primary m-2"> ثبت</button></div></form></div>')
                $('#add-bt').attr('hidden', 'true');
                $('#close-bt').removeAttr('hidden');
            })

            $('#close-bt').click(function () {
                $('.category').attr('hidden', true);
                $('#add-bt').removeAttr('hidden');
                $('#close-bt').attr('hidden', true);
            })
        })
    </script>
@endsection
