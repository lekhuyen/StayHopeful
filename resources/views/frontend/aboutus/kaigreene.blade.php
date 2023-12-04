@extends('frontend.site')
@section('title', 'teamname')
@section('main')


{{-- <link rel="stylesheet" href="{{asset('aboutuscss/teamname.css')}}"> --}}
{{-- teamname.css --}}

<br>
<br>
<h1>Meet Kai Greene, A Lead Developer</h1>

    <br>
    <div class="container mt-3 introduction">
        {{-- introduction_1 --}}
        <div class="row">
            <a href="{{ route('aboutus.whoweare') }}" class="about-us-link" style="display: inline-block; margin-bottom: 10px;">
                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> Go Back
            </a>
            <div class="col-md-8 offset-md-2">
                <span class="introduction_1">
                    Kai Greene, a coding prodigy from a small town, found solace and excitement in the world of programming at an early age. Gifted with a sharp mind and a natural aptitude for technology, Kai's journey led her to pursue a degree in computer science. Growing up in a tight-knit community, she often found herself daydreaming about the endless possibilities that technology could unlock.
                </span>
                <span>
                    Kai's professional journey took her through various tech companies, where she earned a reputation for her innovative problem-solving skills and dedication to creating streamlined and efficient software solutions.
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-3 the_past">
        <h5>Meeting the Founder:</h5>
        <div class="clearfix">
            <span class="col-md-8 offset-md-2">
                Kai's journey took an unexpected turn when she attended a tech conference where John Doe, the founder of the donation website, was speaking. Impressed by John's vision for leveraging technology for social good, Kai approached him after the talk. The two immediately connected over their shared passion for using technology to address societal challenges.
            </span>
            <span class="col-md-8 offset-md-2">
                Recognizing Kai's talent and enthusiasm, John invited her to join the development team of the donation website. Excited by the opportunity to apply her skills to a cause she believed in, Kai accepted the offer. Little did she know that this collaboration would lead to the creation of innovative features that would enhance the website's functionality and user experience.
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
                        alt="kaigreene_image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="kaigreene_image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="kaigreene_image">
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
                As the Lead Developer, Kai is at the forefront of implementing technological advancements for the donation website. She has introduced features that optimize the platform's performance, making it more user-friendly and scalable.
            </span>
            <span class="col-md-8 offset-md-2">
                Looking ahead, Kai envisions incorporating artificial intelligence and machine learning to personalize the donor experience and improve the platform's efficiency. She dreams of a future where technology seamlessly connects donors with causes, creating a more dynamic and responsive giving ecosystem.
            </span>
            <p class="col-md-8 offset-md-2">
                She quote: "Technology is a bridge, connecting the dreams of today with the possibilities of tomorrow. As a developer, I see each line of code as a chance to build that bridge and make a meaningful impact."
            </p>
        </div>
    </div>

@include("frontend/login/login");
@endsection
