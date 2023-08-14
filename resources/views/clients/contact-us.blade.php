@extends('clients.layouts.master')

@section('content')

    <div class="container p-4">

        @if(session('success'))
            <div class="alert alert-success  w-75 m-auto" role="alert" style="margin-top: 15% !important; margin-bottom: 4% !important;">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="mb-sm-4 text-center mb-4">ارتباط با ما </h1>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">

                <h4>آدرس </h4>
                <address>
                    <strong>
                       خراسان رضوی - مشهد
                    </strong>
                    <br>
                    شعبه ۱ در بازار امام رضا طبقه دوم و شعبه ۲ در امامت بین امامت ۱۵ و ۱۷<br>
                    <abbr title="Telephone">تلفن:</abbr> <a href="tel:+989154071025">09154071025</a> <br>
                    <abbr title="Mail">ایمیل:</abbr><a href="">email.example.com</a><br>
                </address>
            </div>

        </div>
        <div class="row">
                <div class="col-12 col-md-6 mb-3">
                <form action="{{ route('contact-us.create') }}" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی :</label>
                                <input type="text"  name="full_name" id="full_name" class="form-control" required>
                                @error('full_name') <p class="text-danger">مقدار را درست وارد کنید .</p> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">ایمیل :</label>
                                <input type="email" name="email" id="email" class="form-control"  required>
                                @error('email') <p class="text-danger">مقدار را درست وارد کنید .</p> @enderror

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="textarea">پیغام:</label>
                        <textarea class="form-control"  name="description" id="textarea" cols="30" rows="10" required></textarea>
                        @error('description') <p class="text-danger">مقدار را درست وارد کنید .</p> @enderror



                    </div>
                    <button type="submit" class="btn btn-primary px-5">ارسال</button>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <h2 class="text-center">                شعبه فعال اول امامت</h2>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d464.9554805652883!2d59.53619778645855!3d36.33100148216063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1691829417495!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <br>
                <h2 class="text-center">                 شعبه فعال دوم بازار امام  رضا</h2>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2401.5717919836557!2d59.6138913406281!3d36.282902933319534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c90d6ff315ff3%3A0xdeebd7947fe94506!2sBazaar%20Reza!5e0!3m2!1sen!2s!4v1691829295765!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>@endsection
