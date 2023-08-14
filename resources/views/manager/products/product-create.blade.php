@extends('manager.layouts.master')

@section('title')
    افزودن محصول
@endsection

@section('content')

    <div style="width: 95%">

        <form action="{{ route('manager.product.create') }}" method="POST" id="product_create_form"
              class="form-control m-4 p-5"
              enctype="multipart/form-data" style="font-size: 12px;">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="file"> انتخاب تصاویر </label>
                    <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple required>
                </div>

                <div class="form-group col-md-6">
                    <label for="file"> انتخاب تصاویر شاخص</label>
                    <input type="file" name="base_image" id="images" accept="image/png, image/jpeg"  required>
                </div>
            </div>
            <hr class="py-4">


            <div class="center-aline pb-3">
                <h4>انتخاب دسته بندی ها </h4>
            </div>

            <div class="row pb-5">

                <div class="col-md-6">
                    <label for="product_category">انتخاب دسته بندی محصول :</label>
                    <select class="form-select form-control" id="product_category" name="product_category_id"
                            aria-label="Default select example"
                            required>
                        @foreach($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="product_groups">انتخاب نوع محصول :</label>
                    <select class="form-select form-control" name="product_group_id" id="product_groups"
                            aria-label="Default select example"
                            required>
                        @foreach($product_group as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>


            <hr class="py-4">

            <div class="row">

                <div class="mb-3 col-md-12">
                    <input type="text" class="form-control account-font" name="fa_name" id="fa_name"
                           placeholder="نام فارسی" required>
                </div>
            </div>

            <div class="row">

                <div class="mb-3 col-md-6">
                    <input type="text" class="form-control account-font" name="warranty" id="warranty"
                           placeholder="18 ماه گارانتی ">
                </div>

                <div class="mb-3 col-md-6">

                    <div class="row">

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="true" id="most_sold_products"
                                   name="most_sold_products">
                            <label class="form-check-label" for="flexCheckDefault">
                                نمایش در پیشنهادات شگفت انگیز
                            </label>
                        </div>

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="true" id="special_offers"
                                   name="special_offers">
                            <label class="form-check-label" for="flexCheckChecked">
                                نمایش در پیشنهاد تخفیف های ویژه
                            </label>
                        </div>

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="false" id="most_sold_products"
                                   name="most_sold_products">
                            <label class="form-check-label" for="flexCheckDefault">
                                در صورت ناموجود بودن محصول تیک را فعال کنید.
                            </label>
                        </div>

                    </div>
                </div>

            </div>


            <div class="mb-3">
                <label for="description" class="form-label">توضیحات :</label>
                <textarea class="form-control account-font" name="description" id="description" rows="3"
                          placeholder="توضیحات محصول را وارد نمایید ..." required></textarea>
            </div>


            <hr class="py-3">

            <div class="center-aline pt-0 pb-3">
                <h4>بخش قیمت ها </h4>
            </div>

            <div id="coloring">

                <div style="border: 1px solid #7979d3 ; border-radius: 20px">
                    <div class="row p-3">

                        <div class="mb-3 col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price">قیمت (تومان):</label>
                                    <input type="number" class="form-control account-font price" name="product0[price]"
                                           placeholder="130000" style="height: 30px; font-size: 12px" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="discount_percent">تخفیف (درصد):</label>
                                    <input type="number" class="form-control account-font discount_percent"
                                           name="product0[discount_percent]"
                                           placeholder="8%" style="height: 30px; font-size: 12px">
                                </div>

                            </div>

                        </div>

                        <div class="mb-3 col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="color">رنگ:</label>
                                    <input type="text" class="form-control account-font  color" name="product0[color]"
                                           placeholder="آبی" style="height: 30px; font-size: 12px">
                                </div>

                                <div class="col-md-4">
                                    <label for="code_color">کد رنگ :</label>
                                    <input type="color" name="product0[code_color]" class="form-control color_code"
                                           style="height: 30px; font-size: 12px">
                                </div>

                                <div class="col-md-4">
                                    <label for="quantity">موجودی انبار :</label>
                                    <input type="number" name="product0[quantity]" class="form-control quantity"
                                           style="height: 30px; font-size: 12px">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="pt-4" style="text-align: center">
                <button type="button" class="btn btn-outline-primary add-coloring" style="border-radius: 25px">افزودن
                    قیمت جدید
                </button>
            </div>

            <hr class="mt-5">

            <div class="center-aline pb-4">
                <h4>مشخصات فنی </h4>
            </div>

            <div style="border: 1px solid #7979d3 ; border-radius: 20px">

                <div id="technical_specifications">

                    <div class="row p-3">

                        <div class="col-md-4">
                            <label for="key">مشخصه :</label>
                            <input type="text" class="form-control account-font" name="technical_specifications0[key]"
                                   id="key"
                                   style="height: 30px; font-size: 12px">
                        </div>
                        <div class="col-md-4">
                            <label for="value">توضیح :</label>
                            <input type="text" class="form-control account-font" name="technical_specifications0[value]"
                                   id="value"
                                   style="height: 30px; font-size: 12px">
                        </div>
                        <div class="col-md-4">
                            <label for="value">آیکون :</label>
                            <input type="text" class="form-control account-font" name="technical_specifications0[icon]"
                                   id="value"
                                   style="height: 30px; font-size: 12px" disabled>
                        </div>

                    </div>
                </div>

                <div class="pt-4 pb-2" style="text-align: center">
                    <button type="button" class="btn btn-outline-primary add_technical_specifications"
                            style="border-radius: 25px">
                        افزودن
                        مشخصه جدید
                    </button>
                </div>

            </div>

            <hr class="py-5 ">

            <div>
                <div class="center-aline pb-4">
                    <h4>مشخصات کلی </h4>
                </div>
                <div class="p-2 pb-0">
                    <div id="textid" class="form-control">
                        <textarea id="open-source-plugins" name="general_specifications"></textarea>
                        <script src="{{ asset('vendor/assets/ckeditor/ckeditor.js') }}"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                            };
                            CKEDITOR.replace('open-source-plugins', options);
                        </script>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-success px-5 mt-5" style="border-radius: 25px">ثبت</button>

        </form>
    </div>
@endsection

@section('script')

    <script>

        $(document).ready(function () {

            var i = 0;
            var x = 0;

            $('.add-coloring').click(function () {

                i += 1;
                let newDiv = $('<div class="dynamicDiv mt-2" style="border: 1px solid #7979d3 ; border-radius: 20px"><div class="row p-3"><div class="mb-3 col-md-6"><div class="row"><div class="col-md-6"><label for="price">قیمت (تومان):</label><input type="number" class="form-control account-font" name="product' + i + '[price]" id="price" placeholder="130000" style="height: 30px; font-size: 12px" required></div><div class="col-md-6"><label for="discount">تخفیف (درصد):</label><input type="number" class="form-control account-font" name="product' + i + '[discount]" id="discount" placeholder="8%" style="height: 30px; font-size: 12px" ></div></div></div><div class="mb-3 col-md-6"><div class="row"><div class="col-md-4"><label for="color">رنگ:</label><input type="text" class="form-control account-font " name="product' + i + '[color]" id="color" placeholder="آبی" style="height: 30px; font-size: 12px"></div><div class="col-md-4"><label for="color_code">کد رنگ :</label><input type="color" name="product' + i + '[color_code]" id="color_code" class="form-control" style="height: 30px; font-size: 12px"></div><div class="col-md-4"><label for="quantity">موجودی انبار :</label><input type="number" name="product' + i + '[quantity]" id="quantity" class="form-control" style="height: 30px; font-size: 12px"></div></div></div></div></div>')
                let removeBtn = $('<div style="padding-right: 10px; padding-bottom: 7px;"><button type="button" class="btn btn-outline-danger remove-btn" style="border-radius: 25px">حذف</button></div>');


                newDiv.append(removeBtn);
                $('#coloring').append(newDiv);


                removeBtn.click(function () {
                    i -= 1;
                    $(this).parent(".dynamicDiv").remove();
                })

            })


            $('.add_technical_specifications').click(function () {
                x += 1;

                let newDiv = $('<div class="dynamic row p-3"><div class="col-md-4"><label for="key">مشخصه :</label><input type="text" class="form-control account-font" name="technical_specifications' + x + '[key]" id="key" style="height: 30px; font-size: 12px" required></div><div class="col-md-4"><label for="value">توضیح :</label><input type="text" class="form-control account-font" name="technical_specifications' + x + '[value]" id="value" style="height: 30px; font-size: 12px" required></div><div class="col-md-4"><label for="value">آیکون :</label><input type="text" class="form-control account-font" name="technical_specifications' + x + '[icon]" id="value" style="height: 30px; font-size: 12px" required></div>')
                let removeBtn = $('<div class="col-md-2 pt-4"><button type="button" class="btn btn-outline-danger remove-btn py-1" style="border-radius: 25px">حذف</button></div></div>')
                newDiv.append(removeBtn);

                $('#technical_specifications').append(newDiv);

                removeBtn.click(function () {
                    x -= 1;
                    $(this).parent('.dynamic').remove();
                })
            });

            $('#ssi-upload').ssi_uploader({
                url: "{{ route('manager.product.create') }}"
            });

        })


    </script>
@endsection
