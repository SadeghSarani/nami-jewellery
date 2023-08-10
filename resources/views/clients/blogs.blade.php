@extends('clients.layouts.master')

@section('title')
    مقالات
@endsection

@section('content')

    <div class="container pt-3">

        <div class="row" style="transform: none;">

            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">

                <div class="row mt-5">

                    @foreach($blogs as $blog)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="post-card">
                                <div class="post-thumbnail">
                                    <a href="{{ route('blog.single', base64_encode($blog->id)) }}" target="_blank">
                                        <img data-src=""
                                             alt="..."
                                             src="{{ asset("storage/$blog->image") }}"
                                             class="animated fadeIn lazyLoadXT-completed">
                                    </a>

                                </div>
                                <div class="post-title">
                                    <a href="{{ route('blog.single', base64_encode($blog->id)) }}"
                                       target="_blank">{{ $blog->subject }}</a>
                                    <span class="post-date" dir="ltr">{{ verta($blog->created_at)->format('Y.m.d') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div>{!! $blogs->links() !!}</div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3 sidebar sticky-sidebar pt-4"
                 style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                <div class="theiaStickySidebar"
                     style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">

                    <div class="widget-posts dt-sn dt-sl mb-3">

                        <div class="title-sidebar dt-sl mb-3">
                            <h3>جدیدترین نوشته ها</h3>
                        </div>

                        <div class="content-sidebar dt-sl">

                            @foreach($new_blogs as $blog)

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

