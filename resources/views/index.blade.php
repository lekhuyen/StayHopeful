@extends('frontend.site')
@section('title', 'StayHopeful')
@section('main')
    {{-- keenslider --}}
    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('indexcss/indexdonate.css') }}">
    {{-- keenslider --}}
    <!-- carosel -->

    <div class="PostSlide">
        <div class="innerContainer active">
            <div class="slider">
                @foreach ($slider as $item)
                    <div class="slide">
                        <div style="background:url('{{ $item->url_image }}')">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="handles">
                <span class="prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: 30px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999"
                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
                <span class="next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-right: 30px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999"
                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
            </div>
            <div class="dots">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="donate-home">
                    <div class="donate-user-index">
                        <div class="keen-slider" id="my-keen-slider" data-keen-slider-v>
                            {{-- content donate user --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>RECENT PROJECTS</h4>
                    </div>
                    <div>
                        <a href="{{ route('project.index', 1) }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- card -->
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
                <div class=" col-xxl-4 col-xl-4 col-lg-6 large ">
                    <a href="{{ route('detail.post', [$project->id, Str::slug($project->title).'.html']) }}" class="a-card">
                        <div class="card card_wapper" style="width: 26rem;">
                            @if ($project->status == 0)
                                <div class="project-status">ON GOING</div>
                            @else
                                <div class="project-status-finish">FINISHED</div>
                            @endif
                            <img src="{{ asset($project->images[0]->image) }}" class="card-img-top card-img-top-1"alt="...">
                            <div class="card-body card-body-1">
                                <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                <div class="cart-description-post">
                                    <p class="card-text card-text-1-1" data-i18n="text2">
                                        {{ strip_tags($project->description) }}</p>
                                </div>
                                <p class="card-title-child">
                                    Received:
                                    <span>
                                        ${{ number_format($project->donateInfo->sum('amount'), 2) }}
                                        {{ number_format($project->donateInfo->sum('amount')) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        ${{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', [$project->id, Str::slug($project->title).'.html']) }}"
                                    class="btn btn-primary btn-primary-1">Details</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    <!-- su kien gan nhat -->

    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>FINISHED PROJECTS</h4>
                    </div>
                    <div>
                        <a href="{{ route('project.index', 1) }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- card -->
    <div class="container">
        <div class="row">
            @foreach ($project_finish as $project)
                <div class="col-xxl-3 col-xl-3">
                    <a href="{{ route('detail.post', [$project->id, Str::slug($project->title).'.html']) }}" class="a-card">
                        <div class="card card_wapper" style="width: 19.5rem;">
                            @if ($project->status == 0)
                                <div class="project-status">ON GOING</div>
                            @else
                                <div class="project-status-finish">FINISHED</div>
                            @endif
                            <img src="{{ asset($project->images[0]->image) }}"
                                class="card-img-top card-img-top-1"alt="...">
                            <div class="card-body">
                                <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                <div class="cart-description-post">
                                    <p class="card-text card-text-1-1" data-i18n="text2">
                                        {{ strip_tags($project->description) }}
                                    </p>
                                </div>
                                <p class="card-title-child">
                                    Received:
                                    <span>
                                        ${{ number_format($project->donateInfo->sum('amount'), 2) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        ${{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', [$project->id, Str::slug($project->title).'.html']) }}"
                                    class="btn btn-primary btn-primary-1">Details</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach




        </div>
    </div>

    <!-- video -->
    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>VIDEO GALLERY</h4>
                    </div>
                    <div>
                        <a href="{{ route('video.index') }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-lg-4 col-md-6 col-sm-4 video_status">
                    <video id="myVideo" src="{{ asset($video->video) }}" controls width="400"
                        height="200"></video>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid" style="background-color: rgb(36,90,190); margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="color: white; padding-top: 30px; border-bottom: 1px solid #fff">
                        <h3>STAYHOPEFUL ALREADY HELPED:</h3>
                    </div>
                </div>
                <div class="col-lg-12" style="display: flex; align-content: center">
                    <div class="statistical">
                        <div class="project-count">
                            <i class="fa-solid fa-globe"></i>
                            <span>123</span>
                        </div>
                        <span style="font-size: 18px;">CASES</span>
                    </div>
                    <div class="statistical">
                        <div class="total-money">
                            <i class="fa-regular fa-face-smile"></i>
                            <span class="odometer" id="odometer"></span>
                        </div>
                        <span style="font-size: 18px;">USD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('isVerified'))
        @include('frontend/login/login', ['isVerified', true]);
    @else
        @include('frontend/login/login');
        @include('frontend/profile/popup_profile')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
        integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/getuserdonate.js') }}"></script>
    <script src="{{ asset('js/indexslider.js') }}"></script>
    <script src="{{ asset('js/countdonate.js') }}"></script>
    @stop()
