@extends('manager.layouts.master')

@section('title')
    افزودن عکس محصولات
@endsection

@section('content')

    <div class="p-3 m-3" style="font-size: 12px;">

        @if(Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('delete'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('delete') }}
            </div>
        @endif

        <button class="btn btn-success m-3 btn-icon-sm add-image">
            <i class="la la-plus"></i>
            افزودن تصویر جدید
        </button>

        <div class="add-image-form m-3 p-3 border" hidden></div>

        <table class="table table-bordered" id="" width="100%">
            <thead>

            <tr>
                <th>
                    #
                </th>
                <th>
                    نام محصول
                </th>
                <th>
                    تصویر
                </th>
                <th>
                    عملیات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_image as $item )
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $products->product_name }}
                    </td>

                    <td>
                        <img
                            src="{{ asset("product_photo/$item->image") }}"
                            class="img-thumbnail" alt="Responsive image" width="150px" height="150px">
                    </td>
                    <td>
                        <form method="POST" action="{{ route('product.image.delete', $item->id) }}" accept-charset="UTF-8">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟');"
                                    type="submit"><i class="fa fa-trash"></i></button>

                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $product_image->links() }}
    </div>

@endsection


@section('script')

    <script src="{{ asset('manager/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/jquery/jquery/jquery-3.6.3.min.js') }}"></script>
    <script>

        $(document).ready(function () {

            $('.add-image').click(function () {
                $(".add-image-form").removeAttr('hidden');
                $(".add-image-form").html('<div class="row"><div class="col-md-9"><form method="POST" action="{{ route('product.image.create', $products->id)}}" enctype="multipart/form-data"><div class="form-group"><label for="">تصویر مورد نظر خود را انتخاب کنید :</label><input class="col-md-12" required name="image" type="file"></div><div class="form-group"><button type="submit" class="btn btn-primary"> ثبت</button></div></form></div></div>')
            })
        })

    </script>
@endsection



