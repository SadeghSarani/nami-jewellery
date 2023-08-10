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
                    مشهد -پاساژ علاءالدین - طبقه منفی یک<br>
                    <abbr title="Telephone">تلفن:</abbr> <a href="tel:+989152931003">09152931003</a> <br>
                    <abbr title="Mail">ایمیل:</abbr><a href="mailto:info@nasimertebat.com">info@nasimertebat.com</a><br>
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

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24455.726183704843!2d59.59540390349027!3d36.28573266686247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c910b9fe40e81%3A0xe9258c4c701308f1!2sAladdin%20Sharq%20Commercial%20Complex!5e1!3m2!1sen!2sus!4v1687009182283!5m2!1sen!2sus"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>@endsection
