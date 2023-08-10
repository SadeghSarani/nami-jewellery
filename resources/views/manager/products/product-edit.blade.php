@extends('manager.layouts.master')

@section('title')
    ویرایش محصول
@endsection

@section('content')

    <div class="pb-5" style="width: 95%">

        <form action="{!! route('manager-product-update', $product->id) !!}" method="POST" id="product_create_form" class="form-control m-4 p-5"
              enctype="multipart/form-data" style="font-size: 12px;">
            @csrf

            <div class="form-control" style="margin-right: 25px; margin-top: 5%">
                <div class="py-3">
                    <label for="file"> انتخاب تصاویر </label>
                    <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple>
                </div>
                <div class="row py-4">
                    @foreach($product->images as $key => $image )
                        <div class="col-md-3">
                            <img src="{{ asset("storage/$image") }}"
                                 class="img-thumbnail" alt="Responsive image" width="150px" height="150px">
                            <a href="{{ route('manager.product.delete.image', [$product->id, $key]) }}"
                               onclick="return confirm('آیا مطمئن هستید؟');" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr class="py-4">
            <div class="form-group col-md-6">
                <label for="file"> انتخاب تصاویر شاخص</label>
                <input type="file" name="base_image" id="images" accept="image/png, image/jpeg">
            </div>
            <hr class="py-4">


            <div class="center-aline pb-3">
                <h4>انتخاب دسته بندی ها </h4>
            </div>

            <div class="row pb-5">

                <div class="col-md-6">
                    <label for="product_category">انتخاب دسته بندی محصول :</label>
                    <select class="form-select form-control" name="product_category_id" id="product_category"
                            aria-label="Default select example"
                            required>
                        @foreach($category as $item)
                            <option value="{{ $item->id }}"
                                    @if($product->product_category_id  == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="product_groups">انتخاب نوع محصول :</label>
                    <select class="form-select form-control" name="product_group_id" id="product_groups"
                            aria-label="Default select example"
                            required>
                        @foreach($product_group as $item)
                            <option value="{{ $item->id }}"
                                    @if($product->product_group_id == $item->id) selected @endif >{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>


            <hr class="py-4">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <input type="text" class="form-control account-font" name="fa_name" id="fa_name"
                           placeholder="نام فارسی" value="{{ $product->fa_name }}">
                </div>
                <div class="mb-3 col-md-6">
                    <input type="text" class="form-control account-font" name=en_name id="en_name"
                           placeholder="نام انگلیسی" value="{{ $product->en_name }}">
                </div>
            </div>

            <div class="row">

                <div class="mb-3 col-md-6">
                    <input type="text" class="form-control account-font" name="warranty" id="warranty"
                           placeholder="18 ماه گارانتی " value="{{ $product->warranty }}">
                </div>

                <div class="mb-3 col-md-6">

                    <div class="row">

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="true" id="most_sold_products"
                                   name="most_sold_products" @if($product->most_sold_products == 'true') checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                                نمایش در پر فروش ترین محصولات
                            </label>
                        </div>

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="true" id="special_offers"
                                   name="special_offers" @if($product->special_offers == 'true') checked @endif>
                            <label class="form-check-label" for="flexCheckChecked">
                                نمایش در پیشنهاد های ویژه
                            </label>
                        </div>

                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="true" id="active"
                                   name="active" @if($product->active == 'false') checked  @endif>
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
                          placeholder="توضیحات محصول را وارد نمایید ..."> {{ $product->description }}</textarea>
            </div>

            <hr class="py-3">

            <div class="center-aline pt-0 pb-3">
                <h4>بخش قیمت ها </h4>
            </div>

            <div id="coloring">

                @foreach($product->productItem as $productItem)

                    <div style="border: 1px solid #7979d3 ; border-radius: 20px">
                        <div class="row p-3">

                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="price">قیمت (تومان):</label>
                                        <input type="number" class="form-control account-font price"
                                               name="product{{ $loop->iteration }}[price]"
                                               placeholder="130000" style="height: 30px; font-size: 12px"
                                               value="{{ $productItem->price }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="discount_percent">تخفیف (درصد):</label>
                                        <input type="number" class="form-control account-font discount_percent"
                                               name="product{{ $loop->iteration  }}[discount_percent]"
                                               placeholder="8%" style="height: 30px; font-size: 12px"
                                               value="{{ $productItem->discount_percent }}">
                                    </div>

                                </div>

                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="color">رنگ:</label>
                                        <input type="text" class="form-control account-font  color"
                                               name="product{{ $loop->iteration }}[color]"
                                               placeholder="آبی" style="height: 30px; font-size: 12px"
                                               value="{{ $productItem->color }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="code_color">کد رنگ :</label>
                                        <input type="color" name="product{{ $loop->iteration }}[code_color]" class="form-control code_color"
                                               style="height: 30px; font-size: 12px"
                                               value="{{ $productItem->code_color }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="quantity">موجودی انبار :</label>
                                        <input type="number" name="product{{ $loop->iteration }}[quantity]" class="form-control quantity"
                                               style="height: 30px; font-size: 12px"
                                               value="{{ $productItem->quantity }}">
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div style="padding-right: 10px; padding-bottom: 7px;">
                            <button type="button" class="btn btn-outline-danger productItemRemove-btn" value="{{ $productItem }}"  style="border-radius: 25px">
                                حذف
                            </button>
                        </div>
                    </div>
                @endforeach

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

                    @foreach($product->customField as $field)
                        <div class="row p-3">

                            <div class="col-md-4">
                                <label for="key">مشخصه :</label>
                                <input type="text" class="form-control account-font"
                                       name="technical_specifications{{ $loop->iteration  }}[key]"
                                       id="key"
                                       style="height: 30px; font-size: 12px" value="{{ $field->key }}">
                            </div>
                            <div class="col-md-4">
                                <label for="value">توضیح :</label>
                                <input type="text" class="form-control account-font"
                                       name="technical_specifications{{ $loop->iteration  }}[value]"
                                       id="value"
                                       style="height: 30px; font-size: 12px" value="{{ $field->value }}">
                            </div>
                            <div class="col-md-4">
                                <label for="value">آیکون :</label>
                                <input type="text" class="form-control account-font"
                                       name="technical_specifications{{ $loop->iteration  }}[icon]"
                                       id="value"
                                       style="height: 30px; font-size: 12px" value="{{ $field->icon }}">
                            </div>

                            <div class="col-md-2 pt-4">
                                <button type="button" class="btn btn-outline-danger remove-btn py-1"
                                        style="border-radius: 25px" value="{{ $field }}">حذف
                                </button>
                            </div>
                        </div>
                    @endforeach

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
                        <textarea id="open-source-plugins" name="general_specifications">{{ $product->general_specifications }}</textarea>
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

            var i = {{ $product->productItem->count() }};
            var x = {{ $product->customField->count() }};

            $('.add-coloring').click(function () {

                i += 1;
                let newDiv = $('<div class="dynamicDiv mt-2" style="border: 1px solid #7979d3 ; border-radius: 20px"><div class="row p-3"><div class="mb-3 col-md-6"><div class="row"><div class="col-md-6"><label for="price">قیمت (تومان):</label><input type="number" class="form-control account-font" name="product' + i + '[price]" id="price" placeholder="130000" style="height: 30px; font-size: 12px" required></div><div class="col-md-6"><label for="discount">تخفیف (درصد):</label><input type="number" class="form-control account-font" name="product' + i + '[discount]" id="discount" placeholder="8%" style="height: 30px; font-size: 12px" ></div></div></div><div class="mb-3 col-md-6"><div class="row"><div class="col-md-4"><label for="color">رنگ:</label><input type="text" class="form-control account-font " name="product' + i + '[color]" id="color" placeholder="آبی" style="height: 30px; font-size: 12px"></div><div class="col-md-4"><label for="color_code">کد رنگ :</label><input type="color" name="product' + i + '[color_code]" id="color_code" class="form-control" style="height: 30px; font-size: 12px"></div><div class="col-md-4"><label for="quantity">موجودی انبار :</label><input type="number" name="product' + i + '[quantity]" id="quantity" class="form-control" style="height: 30px; font-size: 12px"></div></div></div></div></div>')
                let removeBtn = $('<div style="padding-right: 10px; padding-bottom: 7px;"><button type="button" class="btn btn-outline-danger productItemRemove-btn" style="border-radius: 25px">حذف</button></div>');


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

            $('.productItemRemove-btn').click(function() {

                var itemBox = $(this).parent().parent();

                $.ajax({
                    url: "{{ route('manager.productItem.delete')}}",
                    data: {
                        'productItem' : $(this).val()
                    },
                    method: 'POST',
                    success: function(data) {
                        itemBox.remove();
                    }

                })

            })

            $('.remove-btn').click(function () {
                var Box = $(this).parent().parent();

                $.ajax({
                    url: "{{ route('manager.CustomFailed.delete')}}",
                    data: {
                        'CustomFailed' : $(this).val()
                    },
                    method: 'POST',
                    success: function(data) {
                        Box.remove();
                    }

                })
            })
        })


    </script>
@endsection
