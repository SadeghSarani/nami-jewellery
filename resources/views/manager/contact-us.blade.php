@php use App\Models\ContactUs; @endphp
@extends('manager.layouts.master')

@section('title')
    پیغام ها
@endsection


@section('content')
    <!-- Main content -->
    <section class="content p-4">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">پیغام ها </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable"
                                               role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending">
                                                    نام و نام خانوادگی
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1">
                                                    ایمیل
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1">
                                                    پیغام
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1">
                                                    تایخ
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($contactUs as $item)
                                            <tr role="row" class="odd">
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>

@endsection
