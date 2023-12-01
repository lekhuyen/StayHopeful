@extends('frontend.site')
@section('title', 'StayHopeful')
@section('main')
    {{-- keenslider --}}
    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('indexcss/indexdonate.css') }}">
    {{-- keenslider --}}
    <!-- carosel -->

    <section>
        <div id="demo" class="carousel slide" data-bs-ride="carousel" style="height:100vh;">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($slider as $item)
                    <div class="carousel-item active">
                        <img src="{{ asset($item->url_image) }}" alt="Los Angeles" class="d-block carosel_heigth">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="carousel-item active">
                    <img src="{{ asset('img/slider_home3.jpg') }}" alt="Los Angeles" class="d-block carosel_heigth">
                    <div class="carousel-caption">
                        <h3>Viet Nam</h3>
                        <p>Please donate for us</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider_home1.jpg') }}" alt="Los Angeles" class="d-block carosel_heigth">
                    <div class="carousel-caption">
                        <h3>Viet Nam</h3>
                        <p style="color: #fff">Please donate for us!</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider_home2.jpg') }}" alt="Los Angeles" class="d-block carosel_heigth">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div> --}}

                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                    <a href="{{ route('detail.post', $project->id) }}" class="a-card">
                        <div class="card card_wapper" style="width: 26rem;">
                            @if ($project->status == 0)
                                <div class="project-status">ON GOING</div>
                            @else
                                <div class="project-status-finish">FINISHED</div>
                            @endif
                            <img src="{{ asset($project->images[0]->image) }}"
                                class="card-img-top card-img-top-1"alt="...">
                            <div class="card-body card-body-1">
                                <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                <div class="cart-description-post">
                                    <p class="card-text card-text-1-1" data-i18n="text2">
                                        {{ strip_tags($project->description) }}</p>
                                </div>
                                <p class="card-title-child">
                                    Received:
                                    <span>
                                        {{ number_format($project->money2) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        {{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', $project->id) }}"
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
                    <a href="{{ route('detail.post', $project->id) }}" class="a-card">
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
                                        {{ number_format($project->money2) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        {{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', $project->id) }}"
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
                            <span>123.456.789</span>
                        </div>
                        <span style="font-size: 18px;">USD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('isVerified'))
    @include('frontend/login/login',['isVerified',true]);
@else
@include('frontend/login/login');
    @endif
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.js"></script>
    <script src="{{asset('js/getuserdonate.js')}}"></script>
@stop()
