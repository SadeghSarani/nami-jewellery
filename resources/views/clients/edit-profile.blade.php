@extends('clients.layouts.master')

@section('content')
    <main class="main-content dt-sl mt-4 mb-3" style="transform: none;">
        <div class="container main-container" style="transform: none;">
            <div class="row" style="transform: none;">

                <!-- Start Sidebar -->
            @include('component.sidebar-profile')
            <!-- End Sidebar -->

                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="px-3 px-res-0">
                        <div
                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>ویرایش اطلاعات شخصی</h2>
                        </div>
                        <div class="form-ui additional-info dt-sl dt-sn pt-4">
                            <form id="profile-form" action="{{route('address-user')}}"
                                  class="setting_form" method="POST" novalidate="novalidate">
                                <input type="hidden">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-row-title">
                                            <h3>نام</h3>
                                        </div>
                                        <div class="form-row form-group">
                                            <input type="text" class="input-ui pr-2"
                                                   placeholder="نام خود را وارد نمایید" name="first_name"
                                                   value={{$user->name}}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row-title">
                                            <h3>نام و نام خانوادگی</h3>
                                        </div>
                                        <div class="form-row form-group">
                                            <input type="text" class="input-ui pr-2"
                                                   placeholder="نام خانوادگی خود را وارد نمایید" name="last_name"
                                                   value={{$user->family}}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="form-row-title">
                                            <h3>شماره موبایل</h3>
                                        </div>
                                        <div class="form-row form-group">
                                            <input type="text" class="input-ui pl-2 text-left dir-ltr"
                                                   placeholder="شماره موبایل خود را وارد نمایید" name="mobile"
                                                   value={{$user->phone}}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="form-row-title">
                                            <h3>شهر خود را وارد کنید</h3>
                                        </div>
                                        <div class="form-row form-group">
                                            <input type="text" class="input-ui pl-2 text-left dir-ltr"
                                                   placeholder="شهر خود را وارد نمایید" name="city"
                                                   value={{$user->addresses[0]->city ?? ''}}>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-4">
                                        <div class="form-row-title">
                                            <h3>کد پستی</h3>
                                        </div>
                                        <div class="form-row form-group">
                                            <input type="text" class="input-ui pr-2" name="postal_code"
                                                   placeholder="کد پستی خود را وارد نمایید"   value={{$user->addresses[0]->postal_code ?? ''}}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row form-group">
                                            <textarea name="address" class="input-ui pr-2 text-right"
                                                      placeholder="آدرس تحویل گیرنده را وارد نمایید">{{$user->addresses[0]->address ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row mt-3 justify-content-center">
                                    <button id="submit-btn" type="submit" class="btn-primary-cm btn-with-icon ml-2">
                                        <i class="bi bi-arrow-right-circle"></i>
                                        ذخیره تغییرات
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
