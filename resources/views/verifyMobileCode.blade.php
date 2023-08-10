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
                        <form id="login-form" method="POST">

                            <input type="hidden" name="phone" value="">
                            <div id="mobile-phone">
                                <div class="form-row-title">
                                    <h3>شماره تلفن خود را وارد کنید</h3>
                                </div>
                                <div class="form-row with-icon form-group">
                                    <input id="pone-inp" type="number" name="phone" class="input-ui pr-2"
                                           placeholder="شماره تلفن خود را وارد کنید">
                                    <i class="bi bi-phone"></i>

                                    @error('phone')
                                    <p style="color: red">{{$errors->first('phone')}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center pt-3" id="send-phone-btn">
                                <button type="button" class="btn btn-dark">ارسال کد پیامکی</button>
                            </div>

                            <div id="verify-code" hidden>
                                <div class="form-row-title" id="code-verify">
                                    <h3>کد ارسال شده را وارد کنید</h3>
                                </div>
                                <div class="form-row with-icon form-group">
                                    <input id="code-inp" type="number" name="code" class="input-ui pr-2"
                                           placeholder="کد ارسال شده را وارد کنید">
                                    <i class="bi bi-key"></i>
                                </div>
                            </div>

                            <div class="text-center pt-3" id="send-code-verify" hidden>
                                <button type="button" class="btn btn-dark">تایید رمز ارسال شده</button>
                            </div>

                            <div id="change-pass" hidden>
                                <div class="form-row-title" id="change-pass">
                                    <h3>شماره خودرا وارد کنید</h3>
                                </div>
                                <div class="form-row with-icon form-group">
                                    <input id="pass-inp-phone" type="number" name="password" class="input-ui pr-2"
                                           placeholder="شماره خودرا وارد کنید">
                                    <i class="bi bi-key"></i>
                                </div>
                                <div class="form-row-title" id="change-pass">
                                    <h3>رمز جدید را وارد کنید</h3>
                                </div>
                                <div class="form-row with-icon form-group">
                                    <input id="pass-inp" type="number" name="password" class="input-ui pr-2"
                                           placeholder="رمز جدید را وارد کنید">
                                    <i class="bi bi-key"></i>
                                </div>
                            </div>

                            <div class="text-center pt-3" id="send-pass-change" hidden>
                                <button type="button" class="btn btn-dark">تغییر رمز عبور</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal">
                <div class="modal-content">
                    <span class="close" id="closeButton">&times;</span>
                    <h2 id="status-cart-action"></h2>
                    <p id="message-cart-action"></p>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>

<script src="{{ asset('vendor/assets/js/jquery-3.4.1.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $('#send-phone-btn').click(function () {
            var phone = $('#pone-inp').val();

            sendCodeVerify(phone);
        })

        $('#send-code-verify').click(function () {
            var code = $('#code-inp').val();

            checkVerifyCode(code);
        })

        $('#send-pass-change').click(function () {
            var password = $('#pass-inp').val();
            var phone_number = $('#pass-inp-phone').val();

            changePassword(password, phone_number)
        })

        $('#closeButton').click(function () {
            hideModal();
        })
    })

    function changePassword(password, phone_number) {
        $.ajax({
            url: '{{route('changePass')}}',
            method: 'POST',
            data: {
                phone_number: phone_number,
                password: password,
            },

            success: function (response) {
                if (response.status === true) {
                    $('#status-cart-action').text('با موفقیت تغییر کرد');
                    $('#message-cart-action').text('رمز جدید شما تغییر کرد ');
                    showModal();
                    window.location.replace('{{route('userLoginPage')}}')
                } else {
                    $('#status-cart-action').text('با خطا مواجه شد');
                    $('#message-cart-action').text('لطفا بعدا تلاش کنید');
                    showModal();
                    location.reload();
                }
            },
        });
    }

    function sendCodeVerify(phone) {
        $.ajax({
            url: '{{route('verifyMobile')}}',
            method: 'POST',
            data: {
                phone_number: phone,
            },
            success: function (response) {
                if (response.status === true) {
                    $('#verify-code').removeAttr('hidden');
                    $('#send-code-verify').removeAttr('hidden');
                    $('#send-phone-btn').hide();
                    $('#mobile-phone').hide();
                } else {
                    $('#status-cart-action').text('با خطا مواجه شد');
                    $('#message-cart-action').text('لطفا بعدا تلاش کنید');
                    showModal();
                }
            },
        })
    }

    function checkVerifyCode(code) {
        $.ajax({
            url: '{{route('verifyCode')}}',
            method: 'POST',
            data: {
                code: code
            },
            success: function (response) {
                if (response.status === true) {
                    $('#verify-code').hide();
                    $('#send-code-verify').hide();
                    $('#change-pass').removeAttr('hidden');
                    $('#send-pass-change').removeAttr('hidden');
                    $('#status-cart-action').text('کد مورد تایید');
                    showModal();
                } else {
                    $('#status-cart-action').text('کد اشتباه بود');
                    $('#message-cart-action').text(response.message);
                    showModal();
                }
            },
        })
    }

    function showModal() {
        $("#modal").fadeIn();
        $("body").addClass("modal-open");
    }

    function hideModal() {
        $("#modal").fadeOut();
        $("body").removeClass("modal-open");
    }
</script>
