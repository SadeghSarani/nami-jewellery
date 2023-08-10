@extends('manager.layouts.master')

@section('content')
    <div class="container p-2 ">

        <form class="form-control shadow" action="{{ route('blog.create') }}" method="POST"
              enctype="multipart/form-data">
            <div class=" p-3 mb-1">
                <label for="subject" class="form-label px-2">موضوع :</label>
                <input type="text" name="subject" class="form-control  fs-12 col-md-9" id="subject" required>
            </div>
            <div class=" p-3 mb-1 ">
                <label for="image" class="form-label px-2">تصویر شاخص :</label>
                <input type="file" name="image" class="form-control  fs-12 col-md-9 " required>
            </div>
            <div class="p-2 pb-0">
                <label for="image" class="form-label px-2">متن :</label>
                <div id="textid" class="form-control">
                    <textarea id="open-source-plugins" name="description" required></textarea>
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
            <button type="submit" class="btn btn-success w-25 form-control mx-5 mb-3">ثبت</button>
        </form>
    </div>
@endsection
