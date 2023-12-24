@extends('frontend.site')
@section('title', 'Founder')
@section('main')


    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('aboutuscss/johndoe.css') }}">
    {{-- foundername.css --}}

    <div class="btn__back">
        <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>

    <div class="container mt-3 johndoe_introduction">
        <h1 class="johndoe-h1">Meet John Doe, The Founder</h1>
        {{-- introduction_1 --}}

        <div class="row">
            <div class="col-md-10 offset-md-1 introduction_1">

                <span>
                    John Doe, a compassionate soul from a modest background, grew up witnessing the impact of community
                    support. Raised in a town where neighbors looked out for one another, he developed a deep sense of
                    empathy and a belief in the power of collective goodwill.
                </span>
                <span>
                    After earning a degree in business administration, John worked in various nonprofit organizations,
                    where he witnessed the challenges they faced in fundraising and connecting with donors. Inspired by
                    the potential to leverage technology for social good, John decided to combine his business acumen
                    with his passion for making a difference.
                </span>
            </div>
        </div>
    </div>

    <div class="container mt-3 the_past">
        <h5 class="johndoe-h5">Challenges and Triumphs</h5>
        <div class="clearfix">
            <img src="{{ asset('img/johndoe_past.jpg') }}"
                class="col-md-6 float-md-end mb-3 ms-md-3 mx-auto d-block johndoe_image" alt="johndoe_past">

            <span>
                Founding a donation-based website wasn't without hurdles. In the early stages, John faced skepticism
                about the feasibility of a digital platform for charitable giving. Funding was scarce, and convincing
                potential donors of the platform's legitimacy posed a significant challenge.
            </span>
            <br>
            <span>
                Undeterred, John poured his energy into building a transparent and user-friendly website. He
                collaborated with nonprofits to ensure their needs were met and donors could see the direct impact of
                their contributions. Overcoming initial resistance, the platform gained traction, and John's
                commitment to transparency and efficiency started to pay off.
            </span>
            <br>
            <span>
                Triumph came when the website facilitated a major fundraising campaign that surpassed all
                expectations. Donors appreciated the platform's simplicity and the tangible outcomes of their
                contributions. John's commitment to bridging the gap between those in need and those willing to help
                had become a reality.
            </span>
        </div>
    </div>

    <div class="container mt-3 becoming_the_founder_main">
        <h5 class="johndoe_h5">Current Projects and Future Plans</h5>
        <div class="becoming_the_founder2">


            <span class="col-md-10 offset-md-1">
                With the success of his donation website, John is now working on expanding its reach and impact. He's
                developing partnerships with international organizations to address global challenges, from education
                disparities to environmental conservation.
            </span>

            <span class="col-md-10 offset-md-1">
                John is also exploring innovative ways to use technology, such as blockchain, to enhance transparency
                in donation tracking. He envisions a future where donors can trace the journey of their contribution
                from the moment it's made to the tangible impact it creates.
            </span>

            <span class="col-md-10 offset-md-1">
                Looking ahead, John is passionate about fostering a culture of giving. He's initiating educational
                programs to teach young people about the joy of philanthropy and the importance of making a positive
                impact on the world. John dreams of a future where the act of giving is woven into the fabric of
                society, creating a more compassionate and interconnected world.
            </span>
            <p class="col-md-10 offset-md-1">
                He Quote: "I believe in the power of giving, not as a one-time act but as a lifelong commitment to building
                bridges between those who have and those who need. Together, we can turn the page on a new chapter of
                empathy and change."
            </p>
        </div>
    </div>

    <div class="container mt-3 the_present">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <br>
                <span>
                    <strong>Watch how a decision to reset his life led John Doe to build charity.</strong>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/your_video_id" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
