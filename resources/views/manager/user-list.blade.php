@extends('manager.layouts.master')

@section('title')
    لیست کاربران
@endsection


@section('content')

    <div class="container mt-5" style="font-size: 12px;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ستون</th>
                <th scope="col">نام</th>
                <th scope="col">نام خانوادگی</th>
                <th scope="col">شماره تماس</th>
                <th scope="col">تاریخ ثبت نام</th>

            </tr>
            </thead>
            @php $i = 0 @endphp

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ isset($_GET['page']) ? ((($_GET['page'] - 1) * 15) + $i += 1) : $i += 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->family }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {!! $users->links() !!}

    </div>

@endsection
