@extends('clients.layouts.master')

@section('content')
    <main class="main-content dt-sl mt-4 mb-3" style="transform: none;">
        <div class="container main-container" style="transform: none;">
            <div class="row" style="transform: none;">
            @include('component.sidebar-profile')
            <!-- Start Content -->
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="px-3">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                    <h2>اطلاعات شخصی</h2>
                                </div>
                                <div class="profile-section dt-sl">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>نام:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->name}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>شماره تلفن همراه:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>شهر:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->addresses[0]->city ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>کد پستی:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->addresses[0]->postal_code ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>آدرس کامل:</span>
                                            </div>
                                            <div class="value-info address">
                                                <span title="-">{{$user->addresses[0]->address ?? ''}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="profile-section-link">
                                        <a href="{{route('userEditProfilePage')}}"
                                           class="border-bottom-dt">
                                            <i class="mdi mdi-account-edit-outline"></i>
                                            ویرایش اطلاعات شخصی
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
