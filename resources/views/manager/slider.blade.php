@extends('manager.layouts.master')

@section('title')
    اسلایدر
@endsection


@section('content')

    <div class="container p-4 " style="margin: auto">
        <button type="submit" class="btn btn-success m-3 add-images"> افزودن عکس</button>

        <div class="images m-3 p-3 border" hidden></div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    عکس
                </th>
                <th>
                    عملیات
                </th>
            </tr>
            </thead>
            @php $i = 0 @endphp

            <tbody>

            @foreach($slider as $item)

                <tr>

                    <td>
                        {{ $i += 1}}
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $item->image) }}" class="img-thumbnail" alt="Responsive image"
                             width="150px" height="150px">
                    </td>
                    <td>
                        <form method="POST" action="{{ route('slider.delete', $item) }}">
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
    </div>

@endsection
@section('script')

    <!-- jQuery -->
    <script src="{{ asset('manager/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/jquery/jquery/jquery-3.6.3.min.js') }}"></script>

    <script>

        $(document).ready(function () {
            $('.add-images').click(function () {
                $('.images').removeAttr('hidden');
                $('.images').html('<div class="col-md-2"></div><div class="col-md-8"><form method="POST" action="{{ route('slider.create') }}" accept-charset="UTF-8" class="kt-form" enctype="multipart/form-data"><input name="_token" type="hidden" value="iSATSzS4U9FoMv0w9VsmCHpxYcSbIL7QDA6Ezhoo"><div class="kt-portlet__body"><div class="form-group"><label for="">نام دسته بندی :</label><input class="form-control m-input col-md-12" required name="image" type="file"></div><div class="form-group"><button type="submit" class="btn btn-primary"> ثبت</button></div></div><div class="col-md-2"></div></form></div>')
            })

        })
    </script>
@endsection
