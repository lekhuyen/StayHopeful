@extends('frontend.site')
@section('title', 'Project Detail')

@section('main')

    @include('frontend.info_donate.info_donate')

    <div class="container-fluid">
        {{-- post title --}}
        @yield('post-title')

        <div class="container post-detail">
            <div class="row">
                {{-- detail - post --}}
                @yield('detail-post')

                <!-- sidebar -->
                <div class="col-lg-4 nav-bar-right">
                    @include(
                        'frontend.slide-bar.slide_bar',
                        ['categories' => $categories],
                        ['projects' => $projects]
                    )
                </div>
            </div>
        </div>
    </div>


    
@endsection()

