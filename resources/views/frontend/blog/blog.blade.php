@extends('frontend.site')
@section('title', 'Blog')
@section('main')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('blogcss/blog.css') }}">
    {{-- css --}}

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-8 new-page" style="padding-right: 20px; height: 100%;">
                @foreach ($blogs as $blog)
                    <div class="new_child" style="height: 160px;">
                        <img src="{{ asset($blog->images[0]->image) }}" class="blog-detail-img-2">
                        <div>
                            <div class="blog-detail-detail ">
                                <h3 id="title">{{ $blog->title }}</h3>
                            </div>
                            <div class="new-description">
                                <a
                                    href="{{ route('news-detail', [$blog->id, Str::slug($blog->title) . '.html']) }}">{{ strip_tags($blog->description) }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-right">
                    {{ $blogs->links() }}
                </div>
            </div>

            {{-- slidebar --}}
            <div class="col-lg-4 nav-bar-right">
                @include(
                    'frontend.slide-bar.slide_bar',
                    ['categories' => $categories],
                    ['projects' => $projects]
                )
            </div>
        </div>

    </div>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
