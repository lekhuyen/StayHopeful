@extends('frontend.site')
@section('title', 'teamname')
@section('main')


<link rel="stylesheet" href="{{asset('aboutuscss/teamname.css')}}">
{{-- teamname.css --}}
<br>
<br>
<br>
<h1 class="aboutus_teammember_h1">Meet Robert Johnson, A Financial Expert</h1>

    <br>
    <div class="container mt-3 introduction">
        {{-- introduction_1 --}}
        <div class="row">
            <a href="{{ route('aboutus.aboutus_whoweare') }}" class="about-us-link" style="display: inline-block; margin-bottom: 10px; text-decoration: none;">
                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> Go Back
            </a>
            <div class="col-md-8 offset-md-2">
                <span class="introduction_1">
                    Robert Johnson, a finance enthusiast with a keen eye for numbers, grew up in a family where financial prudence was valued. His early experiences managing his own budget and helping others with financial advice shaped his career path. Robert pursued a degree in finance, excelling in his studies and gaining a deep understanding of the intricate world of financial management
                </span>
                <span>
                    His career took him through various financial institutions, where he honed his skills in budgeting, forecasting, and strategic financial planning. Known for his ability to turn complex financial data into actionable insights, Robert became a sought-after professional in the finance industry.
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-3 the_past">
        <h5>Meeting the Founder</h5>
        <div class="clearfix">
            <span class="col-md-8 offset-md-2">
                Robert's path converged with John Doe, the founder of the donation website, at a financial conference focused on the intersection of finance and social impact. Intrigued by John's vision of leveraging financial innovation for charitable causes, Robert struck up a conversation. The two discovered a shared passion for using financial expertise to drive positive change
            </span>
            <span class="col-md-8 offset-md-2">
                Recognizing the crucial role that effective financial management played in the success of nonprofit organizations, John invited Robert to join the team as the financial expert. Excited by the prospect of applying his financial skills to contribute to meaningful causes, Robert accepted the invitation
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
                        alt="robertjohnson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="robertjohnson1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Slide 1</h5>
                        <p class="carousel_p">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="{{ asset('img/janesmith1.jpg') }}" class="teamname1"
                        alt="robertjohnson1">
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
                As the financial expert on the team, Robert is instrumental in ensuring the financial sustainability of the donation website. He has implemented robust financial systems, streamlined budgeting processes, and established partnerships with financial institutions to maximize the impact of donations
            </span>
            <span class="col-md-8 offset-md-2">
                Looking ahead, Robert envisions leveraging financial technologies to enhance the efficiency of donation processing and reduce administrative costs. He aims to create a financial model that ensures long-term sustainability and allows the organization to expand its reach and impact            </span>
            <p class="col-md-8 offset-md-2">
                He quote: "Behind every donation is a carefully managed resource. Let's turn the language of finance into a powerful narrative for positive change—where every dollar invested becomes a catalyst for a better future."
            </p>
        </div>
    </div>


@include("frontend/login/login");
@endsection