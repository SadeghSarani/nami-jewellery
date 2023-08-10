@extends('clients.layouts.master')

@section('title')
    مقالات
@endsection

@section('content')

    <div class="container-fluid pt-4">
        <div class="row" style="transform: none; margin-top: 6%">
            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                <div class="content-page">
                    <div class="content-desc dt-sn dt-sl">
                        <header class="entry-header dt-sl mb-3">
                            <div class="post-meta date" dir="ltr">
                                <i class="mdi mdi-calendar-month"></i> {{ verta($blog->created_at)->format('Y.m.d') }}
                            </div>

                            <div class="post-meta category">
                                <i class="mdi mdi-folder"></i>

                            </div>
                        </header>

                        <div class="post-thumbnail dt-sl p-4">
                            <img class="w-100 animated fadeIn lazyLoadXT-completed"
                                 data-src="{{ asset("storage/$blog->image") }}"
                                 alt="{{ $blog->subject }}"
                                 src="{{ asset("storage/$blog->image") }}" style="border-radius: 20px">
                        </div>
                             <h5 class="px-4 pb-2">{{ $blog->subject }}</h5>
                        <div class="col-12 mt-4 p-4">
                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3 sidebar sticky-sidebar"
                 style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                <div class="theiaStickySidebar"
                     style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
                    <div class="widget-posts dt-sn dt-sl mb-3">
                        <div class="title-sidebar dt-sl mb-3">
                            <h3>جدیدترین نوشته ها</h3>
                        </div>
                        <div class="content-sidebar dt-sl">
                            @foreach($blogs as $blog)

                                <div class="item">
                                    <div class="item-inner">
                                        <div class="item-thumb">
                                            <a href="{{ route('blog.single', base64_encode($blog->id)) }}"
                                               class="img-holder"
                                               style='background-image: url("{{ asset('storage/' . $blog->image) }}")'></a>
                                        </div>
                                        <p class="title">
                                            <a href="{{ route('blog.single', base64_encode($blog->id)) }}"> {{ $blog->subject }}</a>
                                        </p>
                                        <div class="item-meta">
                                            <span class="time" dir="ltr">{{ verta($blog->created_at)->format('Y.m.d') }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
