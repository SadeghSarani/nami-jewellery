@php use App\Models\Blog;use App\Models\Cart;use App\Models\ContactUs;use App\Models\Order;use App\Models\OrderItem;use App\Models\Product;use App\Models\Sending;use App\Models\User; @endphp
@extends('manager.layouts.master')

@section('title')
    پنل مدیریت
@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$countProduct}}</h3>

                            <p>تعداد محصولات</p>
                        </div>
                        <a href="" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$countUser}}</h3>

                            <p>کاربران ثبت شده</p>
                        </div>
                        <a href="" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$countBlog}}</h3>
                            <p>پیغام ها </p>
                        </div>

                        <a href="" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>


            <div class="row mt-5">

                <div class="col-md-4 col-sm-6 col-12">
                    <a href="" class="info-box text-dark">
                        <span class="info-box-icon bg-danger"><i class="fa fa-first-order"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">سفارشات جدید</span>
                            <span class="info-box-number">{{$countOrderNew}} </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <a href="" class="info-box text-dark">
                        <span class="info-box-icon bg-info"><i class="fa fa-flag-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">سفارشات در حال ارسال</span>
                            <span class="info-box-number"> {{$countOrderSending}}</span>
                        </div>
                    </a>
                </div>


                <div class="col-md-4 col-sm-6 col-12">
                    <a href="" class="info-box text-dark">
                        <span class="info-box-icon bg-success"><i class="fa fa-star-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">سفارشات ارسال شده</span>
                            <span class="info-box-number">{{$countOrderPosted}}</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->

@endsection


