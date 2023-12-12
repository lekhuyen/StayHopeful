@extends('frontend.site')
@section('title', 'teamname')
@section('main')

<link rel="stylesheet" href="{{asset('aboutuscss/teamname.css')}}">
{{-- teamname.css --}}
<br>
<br>
<br>
<h1 class="aboutus_teammember_h1">Meet Oliver Hudson, A Creative Director</h1>

    <br>
    <div class="container mt-3 teamname_introduction">
        {{-- introduction_1 --}}
        <div class="row">
            <a href="{{ route('aboutus.aboutus_whoweare') }}" style="display: inline-block; margin-bottom: 10px; text-decoration: none;">
                <i class="fa fa-long-arrow-left" ></i> GO BACK
            </a>
            <div class="col-md-8 offset-md-2">
                <span class="introduction_1">
                    Oliver Hudson, a visionary creative from an artistic family, was destined to express himself through design. Growing up surrounded by paintings, sculptures, and a love for aesthetics, Oliver's passion for creativity led him to pursue a career in the arts. He studied graphic design and visual storytelling, developing a keen eye for transforming ideas into visually compelling narratives.
                </span>
                <span>
                    Oliver's career unfolded in the dynamic world of advertising and branding, where he honed his skills as a Creative Director. Known for his ability to translate abstract concepts into captivating visuals, Oliver thrived in an environment where imagination and innovation were paramount.
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-3 the_past">
        <h5>Meeting the Founder</h5>
        <div class="clearfix">
            <span class="col-md-8 offset-md-2">
                Oliver's path intersected with John Doe, the founder of the donation website, during a creative industry event. Drawn to John's presentation on the power of storytelling in philanthropy, Oliver approached him with an enthusiasm for combining creativity with social impact.
            </span>
            <span class="col-md-8 offset-md-2">
                Recognizing Oliver's unique ability to weave compelling narratives through design, John invited him to join the team as the Creative Director. Excited by the prospect of using his creative skills to elevate charitable causes, Oliver eagerly accepted the invitation.
            </span>
        </div>
    </div>
    <hr>

    <div class="col-md-6 offset-md-3 aboutus_carousel_p">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="teamname1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="oliverhudson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="oliverhudson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <hr>
    <div class="container mt-3 becoming_the_founder_main">
        <h5>Current Projects and Future Plans</h5>
        <div class="plans">
            <span class="col-md-8 offset-md-2">
                As the Creative Director, Oliver plays a pivotal role in shaping the visual identity of the donation website. He has introduced visually striking campaigns that not only convey the urgency of social issues but also inspire hope and action.
            </span>
            <span class="col-md-8 offset-md-2">
                Looking ahead, Oliver envisions expanding the creative reach of the platform through multimedia storytelling. He aims to collaborate with filmmakers, photographers, and artists to create immersive narratives that resonate with donors on a deep emotional level. Oliver dreams of a future where the act of giving is not just a transaction but a transformative and artistic experience.
            </span>
            <p class="col-md-8 offset-md-2">
                He quote: "Art has the extraordinary ability to transcend boundaries and evoke emotions. Let's use creativity as a catalyst for change, turning each brushstroke and pixel into a powerful story that moves hearts and inspires action."
            </p>
        </div>
    </div>

@endsection
@extends('frontend.site')
@section('title', 'teamname')
@section('main')

{{-- teamname.css --}}

<h1>Meet Oliver Hudson, A Creative Director</h1>

    <br>
    <div class="container mt-3 introduction">
        {{-- introduction_1 --}}
        <div class="row">
            <a href="{{ route('aboutus.index') }}" style="display: inline-block; margin-bottom: 10px;">
                <i class="fa fa-long-arrow-left" ></i> Return to About Us page
            </a>
            <div class="col-md-8 offset-md-2">
                <span class="introduction_1">
                    Oliver Hudson, a visionary creative from an artistic family, was destined to express himself through design. Growing up surrounded by paintings, sculptures, and a love for aesthetics, Oliver's passion for creativity led him to pursue a career in the arts. He studied graphic design and visual storytelling, developing a keen eye for transforming ideas into visually compelling narratives.
                </span>
                <span>
                    Oliver's career unfolded in the dynamic world of advertising and branding, where he honed his skills as a Creative Director. Known for his ability to translate abstract concepts into captivating visuals, Oliver thrived in an environment where imagination and innovation were paramount.
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-3 the_past">
        <h5>Meeting the Founder:</h5>
        <div class="clearfix">
            <span class="col-md-8 offset-md-2">
                Oliver's path intersected with John Doe, the founder of the donation website, during a creative industry event. Drawn to John's presentation on the power of storytelling in philanthropy, Oliver approached him with an enthusiasm for combining creativity with social impact.
            </span>
            <span class="col-md-8 offset-md-2">
                Recognizing Oliver's unique ability to weave compelling narratives through design, John invited him to join the team as the Creative Director. Excited by the prospect of using his creative skills to elevate charitable causes, Oliver eagerly accepted the invitation.
            </span>
        </div>
    </div>
    <hr>

    <div class="col-md-6 offset-md-3 ">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="oliverhudson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="oliverhudson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="oliverhudson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <hr>
    <div class="container mt-3 becoming_the_founder_main">
        <h5>Current Projects and Future Plans:</h5>
        <div class="plans">
            <span class="col-md-8 offset-md-2">
                As the Creative Director, Oliver plays a pivotal role in shaping the visual identity of the donation website. He has introduced visually striking campaigns that not only convey the urgency of social issues but also inspire hope and action.
            </span>
            <span class="col-md-8 offset-md-2">
                Looking ahead, Oliver envisions expanding the creative reach of the platform through multimedia storytelling. He aims to collaborate with filmmakers, photographers, and artists to create immersive narratives that resonate with donors on a deep emotional level. Oliver dreams of a future where the act of giving is not just a transaction but a transformative and artistic experience.
            </span>
            <p class="col-md-8 offset-md-2">
                He quote: "Art has the extraordinary ability to transcend boundaries and evoke emotions. Let's use creativity as a catalyst for change, turning each brushstroke and pixel into a powerful story that moves hearts and inspires action."
            </p>
        </div>
    </div>


@include("frontend/login/login")
@endsection
