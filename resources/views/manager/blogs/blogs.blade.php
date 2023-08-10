@extends('manager.layouts.master')

@section('content')

    <div class="container">


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
                <a href="{{ route('blog.create.template') }}"
                   class="btn btn-brand btn-elevate btn-icon-sm">
                    <button class="btn btn-success"><i class="fa fa-plus"></i>
                        افزودن مقاله جدید
                    </button>
                </a>
            </h3>


            <!--begin: Datatable -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        موضوع
                    </th>
                    <th>
                        تاریخ
                    </th>
                    <th>
                        تصویر شاخص
                    </th>

                    <th>
                        عملیات
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($blogs as $item )

                    <tr>
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>
                            {{ $item->subject }}
                        </td>
                        <td dir="ltr">
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                class="img-thumbnail" alt="Responsive image" width="150px" height="150px">
                        </td>
                        <td>

                            <div class="row">
                                <a href="{{ route('blog.edit', $item) }}" class="btn btn-sm btn-success m-1 p-2">
                                    <i class="fa fa-edit"></i></a>

                                <form method="GET" action="{{ route('blog.delete', $item) }}">
                                    @method('GET')
                                    <button class="btn btn-sm btn-danger p-2 mt-1"
                                            onclick="return confirm('آیا مطمئن هستید؟');"
                                            type="submit"><i class="fa fa-trash"></i></button>

                                </form>

                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

            {!! $blogs->links() !!}
        </div>


    </div>

@endsection

