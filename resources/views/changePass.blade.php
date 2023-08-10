<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه ورورد</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/materialdesignicons.min.css') }}">


    <!-- theme color file -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/bootstrap.min.css') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/bootstrap-rtl.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/toastr.css') }}/">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="wrapper">
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                    <div class="form-ui dt-sl dt-sn pt-4">
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ورود به سایت</h2>
                        </div>
                        <form id="login-form" action="{{ route('userLogin') }}" method="POST">

                            <input type="hidden" name="phone" value="">
                            <div class="form-row-title">
                                <h3>شماره موبایل</h3>
                            </div>
                            <div class="form-row with-icon form-group">
                                <input type="number" name="phone" class="input-ui pr-2"
                                       placeholder="شماره موبایل خود را وارد نمایید">
                                <i class="bi bi-phone"></i>


                                @error('phone')
                                <p style="color: red">{{$errors->first('phone')}}</p>
                                @enderror
                            </div>
                            <div class="form-row-title">
                                <h3>رمز عبور</h3>
                            </div>
                            <div class="form-row with-icon form-group">
                                <input type="password" name="password" class="input-ui pr-2"
                                       placeholder="رمز عبور خود را وارد نمایید">
                                <i class="bi bi-key"></i>
                            </div>
                            <div class="form-row mt-3">
                                <input type="submit" value="ورود به سایت" class="btn-primary-cm btn-with-icon mx-auto w-100">
                            </div>

                            @if(session('error'))
                                <div class="pt-4 mt-4 p-2">
                                    <div class="alert-danger">
                                        <p class="pt-1 text-center" style="color: red">{{session('error')}}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-footer text-right">
                                        <a href=""
                                           class="d-inline-block mt-2"> فراموشی رمز عبور</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <span class="d-block font-weight-bold mt-4">کاربر جدید هستید؟</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-footer text-right">
                                        <a href="{{route('UserSignInPage')}}"
                                           class="d-inline-block mr-3 mt-2">ثبت نام در سایت</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
</body>
</html>
