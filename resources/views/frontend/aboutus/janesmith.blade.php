@extends('frontend.site')
@section('title', 'teamname')
@section('main')


{{-- <link rel="stylesheet" href="{{asset('aboutuscss/teamname.css')}}"> --}}
{{-- teamname.css --}}
<br>
<br>
<h1>Meet Jane Smith, The Chief Marketing Officer</h1>

    <div class="container mt-3 introduction">
        {{-- introduction_1 --}}
        <div class="row">
            <a href="{{ route('aboutus.whoweare') }}" class="about-us-link" style="display: inline-block; margin-bottom: 10px;">
                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> Go Back
            </a>
            <div class="col-md-8 offset-md-2">
                <span class="introduction_1">
                    Jane Smith, a dynamic and creative individual, discovered her passion for marketing at a young age. Growing up in a bustling city, she was exposed to the diverse tapestry of cultures and ideas. Jane's academic journey led her to excel in marketing and communications, and she soon became known for her innovative approach to branding.
                </span>
                <span>
                    After years of working with various companies, Jane found herself drawn to causes that transcended traditional business goals. Her desire to make a meaningful impact on society led her to the world of nonprofit organizations, where she could apply her marketing skills to amplify messages of social change.
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-3 the_past">
        <h5>Meeting the Founder:</h5>
        <div class="clearfix">
            <span class="col-md-8 offset-md-2">
                Jane's path crossed with John Doe, the founder of the donation website, at a charity event in the city. Intrigued by the innovative approach of the platform, Jane struck up a conversation with John. They found common ground in their passion for creating positive change and realized the potential of combining their skills to amplify the impact of the donation website.
            </span>
            <span class="col-md-8 offset-md-2">
                Recognizing Jane's expertise in marketing and her genuine commitment to social causes, John invited her to join the team as Chief Marketing Officer. Jane, inspired by the transparency and vision of the platform, enthusiastically accepted the offer, seeing an opportunity to use her skills to connect donors with impactful initiatives.
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
                        alt="janesmith1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="janesmith1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="janesmith1">
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
                As the Chief Marketing Officer, Jane is now at the forefront of expanding the reach and influence of the donation website. She has implemented creative campaigns that not only raise funds but also tell compelling stories of the lives changed by the generosity of donors.
            </span>
            <span class="col-md-8 offset-md-2">
                Looking ahead, Jane envisions leveraging emerging technologies to enhance the donor experience. She aims to implement virtual reality experiences and interactive storytelling to create a deeper connection between donors and the causes they support. Jane dreams of a future where the act of giving is not just a transaction but an immersive and meaningful journey.
            </span>
            <p class="col-md-8 offset-md-2">
                She quote: "In the realm of marketing, our most powerful currency is the ability to tell stories that inspire change. Let's craft narratives that resonate, elevate, and ignite a spark of compassion in every heart."
            </p>
        </div>
    </div>

@include("frontend/login/login");
@endsection
