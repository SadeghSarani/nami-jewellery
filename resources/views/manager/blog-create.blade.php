@extends('manager.layouts.master')

@section('title')
    افزودن بلاگ
@endsection


@section('content')

    <div class="container p-5" style="width: 95%; margin: auto;">

            <div id="textid" class="form-group">
                <script src="{{ asset('manager/tinymce/tinymce.min.js') }}"></script>
                <script type="text/javascript">
                    tinymce.init({
                        selector: "textarea",
                        language: 'fa',
                        extended_valid_elements: 'span',
                        verify_html: true,
                        height: 250,
                        theme: 'modern',
                        plugins: ['link emoticons image'],

                        image_advtab: true,
                        image_title: true,
                        image_caption: true,
                        relative_urls: false,
                        theme_advanced_buttons1: "forecolor,backcolor,fontselect,fontsizeselect",

                        templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                        },
                            {
                                title: 'Test template 2',
                                content: 'Test 2'
                            },
                        ],
                    });
                </script>

                <form class="form-control p-4" action="{{ route('blog.create') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <label for="title">موضوع‌:</label>
                    <input type="text" id="title" name="title" class="form-control mb-4">
                    <textarea id="mytextarea" name="mytextarea" class="form-control"></textarea>
                    <label for="blog-image" class="pt-3"> عکس : </label>
                    <input type="file" name="image" class="form-group" id="blog-image">
                    <button type="submit" class="form-control btn btn-success pt-3" name="submit">ثبت</button>
                </form>
            </div>
    </div>
@endsection
