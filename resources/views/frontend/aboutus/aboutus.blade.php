@extends('frontend.site')
@section('title', 'About Us')
@section('main')
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="{{ asset('aboutuscss/aboutus.css') }}">

    <br>
    <br>
    {{-- Mission sector --}}
    <div class="container mt-3 about-main col-md-8 offset-md-2" data-aos="zoom-in-down">
        @foreach ($aboutuspages as $aboutusmain)
            <div>
                @if ($aboutusmain->section === 'main')
                    <h1>{{ $aboutusmain->title }}</h1>
                    <span class="mission">{{ $aboutusmain->description }}</span>
                    @if ($aboutusmain->images->count() > 0)
                        <img src="{{ asset($aboutusmain->images[0]->url_image) }}" alt="{{ $aboutusmain->title }}" class="aboutus-image-main"  style="max-width: 30%;">
                    @endif
                @endif
            </div>
            <br>
        @endforeach
    </div>

    {{-- About Us Sector --}}
    <div class="container-fluid mt-3">
        @php
            $aboutUsCounter = 0;
            $firstTitle = null;
        @endphp
    
        @foreach ($aboutuspages as $aboutusmain)
            @if ($aboutusmain->section == 'aboutus' && $aboutUsCounter == 0)
                @php
                    $firstTitle = $aboutusmain->title;
                    $aboutUsCounter++;
                @endphp
            @endif
        @endforeach

        @foreach ($aboutuspages as $aboutusmain)
            @if ($aboutusmain->section == 'aboutus')
                <div style="margin-top: 20px">
                    @if ($aboutusmain->title == $firstTitle)
                        <h1>{{ $aboutusmain->title }}</h1>
                    @endif
                    @if ($aboutUsCounter % 2 == 0)
                        <div class="container about-story2" data-aos="zoom-in-right">
                            <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
                                <div class="col aboutus2">
                                    <div><!-- aboutus's Picture 2-->
                                        @if ($aboutusmain->images->count() > 0)
                                            <img src="{{ asset($aboutusmain->images[0]->url_image) }}" alt="{{ $aboutusmain->title }}" class="aboutus-image2">
                                        @endif
                                    </div>
                                </div>
    
                                <div class="col story2">
                                    <div>
                                        <div>
                                            <span>{{ $aboutusmain->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container about-story1" data-aos="zoom-in-left">
                            <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
                                <div class="col story1">
                                    <div>
                                        <span>{{ $aboutusmain->description }}</span>
                                    </div>
                                </div>
    
                                <div class="col">
                                    <div><!-- aboutus's Picture 1-->
                                        @if ($aboutusmain->images->count() > 0)
                                            <img src="{{ asset($aboutusmain->images[0]->url_image) }}" alt="{{ $aboutusmain->title }}" class="aboutus-image1">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
    
                    @php
                        $aboutUsCounter++;
                    @endphp
                </div>
            @endif
        @endforeach
    </div>

    <br>
    {{-- Map Section --}}
    <div class="container mt-3 aboutus_map_section">
        <div class="row">
            <div class="col-md-6 aboutus-text">
                <h1>Our Journey</h1>
                <p>At <strong>StayHopeFul</strong>, we are on a mission to create positive change across multiple fronts.
                    Our commitment extends to promoting sustainability, empowering communities by providing access to
                    education, healthcare, and economic opportunities, delivering humanitarian aid in times of crisis,
                    advocating for the welfare of animals, and working towards global health equity.</p>
                <p>Explore the map below to see the tangible impact of our initiatives. Each marked location represents a
                    step forward in our journey towards a better, more sustainable world. Join us in making a difference for
                    the communities, ecosystems, and lives we serve.</p>
            </div>
            <div class="col-md-6 aboutus-map">
                @include('frontend.aboutus.aboutus_map')
            </div>
        </div>
    </div>

    <br>
    <div class="container mt-3 aboutus-logo">
        @php
            $aboutUsCounter = 0;
            $firstTitle = null;
        @endphp
    
        @foreach ($aboutuspages as $aboutusmain)
            @if ($aboutusmain->section == 'logo' && $aboutUsCounter == 0)
                @php
                    $firstTitle = $aboutusmain->title;
                    $aboutUsCounter++;
                @endphp
            @endif
        @endforeach
    
        <div>
            @if ($firstTitle)
                <h1>{{ $firstTitle }}</h1>
            @endif
    
            @foreach ($aboutuspages as $aboutusmain)
                @if ($aboutusmain->section === 'logo')
                    <div class="row align-items-center">
                        @foreach ($aboutusmain->images as $image)
                            <div class="col-md-2 mb-3">
                                <img src="{{ asset($image->url_image) }}" alt="{{ $aboutusmain->title }}" class="aboutus-image-main img-fluid logo_company">
                            </div>
                        @endforeach
                    </div>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
    
    {{-- call to action sector --}}
    <div class="container mt-3 call_to_action">
        @foreach ($aboutuspages as $aboutusmain)
            @if ($aboutusmain->section === 'introcall')
                <h3>{{ $aboutusmain->title }}</h3>
                <p>{{ $aboutusmain->description }}</p>
            @endif
        @endforeach
        <br>

        @foreach ($aboutuspages as $aboutusmain)
            @if ($aboutusmain->section === 'leftcall')

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <div class="col" data-aos="fade-left" data-aos-duration="1000">
                        <div class="card h-100">
                            <br>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 512 512">
                                    <style>
                                        svg {
                                            fill: #15b5f9
                                        }
                                    </style>
                                    <path
                                        d="M256 48a160 160 0 1 1 0 320 160 160 0 1 1 0-320zm0 368A208 208 0 1 0 256 0a208 208 0 1 0 0 416zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.6-64-64-64c-13.6 18.2-29.8 34.3-48 48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V416c0-8.8 7.2-16 16-16h48c-18.2-13.7-34.3-29.8-48-48zM276 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z" />
                                </svg>
                            </div>
                            <div class="card-body call_to_action_card">
                                <h5 class="card-title">{{ $aboutusmain->lefttitle }}</h5>
                                <p class="card-text card-text-p">{{ $aboutusmain->leftdescription }}</p>
                                <a href="{{ route('detail.donate') }}"
                                    class="btn btn-outline-info btn-sm call_to_action_button">Donate</a></p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        <div class="card h-100">
                            <br>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 512 512">
                                    <style>
                                        svg {
                                            fill: #15b5f9
                                        }
                                    </style>
                                    <path
                                        d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
                                </svg>
                            </div>
                            <div class="card-body call_to_action_card">
                                <h5 class="card-title">{{ $aboutusmain->middletitle }}</h5>
                                <p class="card-text card-text-p">{{ $aboutusmain->middledescription }}</p>
                                <a href="{{ route('feedback.create') }}"
                                    class="btn btn-outline-info btn-sm call_to_action_button">Feedback</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
        
                        <div class="card h-100">
                            <br>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                                    <style>
                                        svg {
                                            fill: #15b5f9
                                        }
                                    </style>
                                    <path
                                        d="M544 248v3.3l69.7-69.7c21.9-21.9 21.9-57.3 0-79.2L535.6 24.4c-21.9-21.9-57.3-21.9-79.2 0L416.3 64.5c-2.7-.3-5.5-.5-8.3-.5H296c-37.1 0-67.6 28-71.6 64H224V248c0 22.1 17.9 40 40 40s40-17.9 40-40V176c0 0 0-.1 0-.1V160l16 0 136 0c0 0 0 0 .1 0H464c44.2 0 80 35.8 80 80v8zM336 192v56c0 39.8-32.2 72-72 72s-72-32.2-72-72V129.4c-35.9 6.2-65.8 32.3-76 68.2L99.5 255.2 26.3 328.4c-21.9 21.9-21.9 57.3 0 79.2l78.1 78.1c21.9 21.9 57.3 21.9 79.2 0l37.7-37.7c.9 0 1.8 .1 2.7 .1H384c26.5 0 48-21.5 48-48c0-5.6-1-11-2.7-16H432c26.5 0 48-21.5 48-48c0-12.8-5-24.4-13.2-33c25.7-5 45.1-27.6 45.2-54.8v-.4c-.1-30.8-25.1-55.8-56-55.8c0 0 0 0 0 0l-120 0z" />
                                </svg>
                            </div>
        
                            <div class="card-body call_to_action_card">
                                <h5 class="card-title">{{ $aboutusmain->righttitle }}</h5>
                                <p class="card-text card-text-p">{{ $aboutusmain->rightdescription }}</p>
                                <a href="{{ route('volunteer.create') }}"
                                    class="btn btn-outline-info btn-sm call_to_action_button">Volunteer</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        
    </div>

    {{-- Our Team sector --}}
    <div class="container-fluid mt-3 aboutus_our_team" data-aos="fade-right">
        <h2 class="aboutus-h2">Who We Are</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <span>
                    Welcome to <strong>StayHopeful</strong>, where our journey towards positive change began 2018. Over the
                    years, we've evolved into a <strong>Empowering Communities: A Hub for Positive Change and
                        Growth</strong> dedicated to making a lasting impact.
                </span>
                <br>
                <span>
                    Our story started with a vision held passionately by <strong>John Doe</strong>. Fueled by the potential
                    to leverage technology, they laid the foundation for <strong>StayHopeful</strong> with the belief that
                    will make a better Tomorrow.
                </span>
            </div>
        </div>
        <br>
        <div class="row align-items-center aboutus_johndoe">
            <div class="col d-none d-lg-block">
                <img class="founder-img1" src="{{ asset('img/aboutus_founder1.jpg') }}" alt="founder1">
            </div>
            <div class="col">
                <div class="card mb-3 aboutus_card_johndoe">
                    <img class="founder-img" src="{{ asset('img/aboutus_founder.jpg') }}" alt="founder">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">John Doe, now known as The Founder, stands at the helm of a thriving online
                            platform. Born from a fusion of passion and purpose, the platform has become a virtual nexus
                            where donors and causes converge</p>
                        <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn btn-outline-info btn-sm our_team_button">Our
                            Team</a>
                    </div>
                </div>
            </div>
            <div class="col d-none d-lg-block">
                <img class="founder-img2" src="{{ asset('img/aboutus_founder2.jpg') }}" alt="founder2">
            </div>
        </div>
    </div>
    <hr>
    {{-- Accordion sector --}}
    <div class="container mt-3" data-aos="zoom-in">
        <h2>Questions you often encounter</h2>
        {{-- Accordion --}}
        <div class="accordion" id="projectAccordion">
            <!-- Projects Funded -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="projectFundedHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#projectFundedCollapse" aria-expanded="true"
                        aria-controls="projectFundedCollapse">
                        <i class="bi bi-check-square"></i> 1. How Can I Make a Donation
                    </button>
                </h2>
                <div id="projectFundedCollapse" class="accordion-collapse collapse show"
                    aria-labelledby="projectFundedHeading" data-bs-parent="#projectAccordion">
                    <div class="accordion-body">
                        To make a donation, simply click on the <a href="{{ route('detail.donate') }}"
                            style="text-decoration: none">Donate</a> button on our homepage. You'll be guided through a
                        secure process to choose your donation amount and payment method.
                    </div>
                </div>
            </div>

            <!-- People Served -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="peopleServedHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#peopleServedCollapse" aria-expanded="false"
                        aria-controls="peopleServedCollapse">
                        <i class="bi bi-person"></i> 2. Where Does My Money Go?
                    </button>
                </h2>
                <div id="peopleServedCollapse" class="accordion-collapse collapse" aria-labelledby="peopleServedHeading"
                    data-bs-parent="#projectAccordion">
                    <div class="accordion-body">
                        Your donation makes a meaningful impact across critical areas. By supporting our Environmental
                        Nonprofit, Humanitarian Aid Organization, and Animal Welfare initiatives, you are directly
                        contributing to positive change. Our commitment to transparency means that funds are allocated to
                        specific programs, including Patient Support and Care for those battling illnesses, Emergency Relief
                        to aid communities in crisis, and Rehabilitation and Support for those rebuilding their lives.
                        Together, we can create a lasting and transformative impact on the environment, humanity, and the
                        welfare of animals. Thank you for being a vital part of our mission
                    </div>
                </div>
            </div>

            <!-- Countries Impacted -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="countriesImpactedHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#countriesImpactedCollapse" aria-expanded="false"
                        aria-controls="countriesImpactedCollapse">
                        <i class="bi bi-globe"></i> 3. Can I Specify How I Want My Donation to be Used?
                    </button>
                </h2>
                <div id="countriesImpactedCollapse" class="accordion-collapse collapse"
                    aria-labelledby="countriesImpactedHeading" data-bs-parent="#projectAccordion">
                    <div class="accordion-body">
                        Certainly! During the donation process, you can indicate any preferences or specify a particular
                        program you'd like your donation to support
                    </div>
                </div>

                <!-- Challenges Faced -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="challengesFacedHeading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#challengesFacedCollapse" aria-expanded="false"
                            aria-controls="challengesFacedCollapse">
                            <i class="bi bi-exclamation-circle"></i> 4. How Can I Contact StayHopeful for More Information?
                        </button>
                    </h2>
                    <div id="challengesFacedCollapse" class="accordion-collapse collapse"
                        aria-labelledby="challengesFacedHeading" data-bs-parent="#projectAccordion">
                        <div class="accordion-body">
                            For more information, feel free to reach out to our team at <a
                                href="mailto:contact@StayHopeful.org"
                                style="text-decoration: none">contact@StayHopeful.org</a> or call us at Hotline :<a
                                href="tel:+842839107612" style="text-decoration: none">+84-28 3910 7612</a> or Fax :<a
                                href="tel:+8402839107614" style="text-decoration: none">84-028 3910 7614</a>. We're here
                            to assist you.
                        </div>
                    </div>
                </div>

                <!-- Future Plans -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="futurePlansHeading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#futurePlansCollapse" aria-expanded="false"
                            aria-controls="futurePlansCollapse">
                            <i class="bi bi-arrow-right-circle"></i> 5. How Can I Get Involved Beyond Donating?
                        </button>
                    </h2>
                    <div id="futurePlansCollapse" class="accordion-collapse collapse"
                        aria-labelledby="futurePlansHeading" data-bs-parent="#projectAccordion">
                        <div class="accordion-body">
                            We appreciate your interest! Explore volunteer opportunities, attend events, or share our
                            mission on social media to help us reach more supporters
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('frontend/login/login')
        @include('frontend/profile/popup_profile')
    @endsection
