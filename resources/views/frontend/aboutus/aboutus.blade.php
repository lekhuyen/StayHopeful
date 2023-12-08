@extends('frontend.site')
@section('title', 'About Us')
@section('main')

<link rel="stylesheet" href="{{asset('aboutuscss/aboutus.css')}}">

<br>
<br>
{{-- Mission sector --}}
<div class="container mt-3 about-main col-md-8 offset-md-2" data-aos="zoom-in-down">
    <h1 class="aboutus_h1">What is our mission</h1>

    <span class="mission">
        At <strong>StayHopeful</strong>, we are dedicated to creating positive and lasting change in the world.
        Our mission is to extend a helping hand to those facing the challenges of disease, combat animal cruelty, and provide relief in the aftermath of natural disasters.
        We believe in the power of collective compassion to heal, protect, and rebuild lives.
        Through strategic initiatives and community-driven support, we strive to make a meaningful impact, fostering a world where every individual, animal, and community can thrive despite adversity.
        Join us in our mission to bring hope, healing, and resilience to those in need.
    </span>

    <img src="{{ asset('img/aboutus_main.jpg') }}" alt="aboutus_main" class="aboutus-image-main">
</div>

<br>
<br>

{{-- About us sector --}}
<h2 class="aboutus-h2">About Us</h2>
<div class="container about-story1" data-aos="zoom-in-left">
    <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
        <div class="col story1">

            <div>

                <span> As a large group of passionate individuals, we founded <strong>StayHopeful</strong> with a shared commitment to making a difference. Inspired by the stories of resilience in the face of adversity, we set out on a mission to combat diseases, end animal cruelty, and respond to natural disasters. Over the years, we've faced challenges head-on, but the stories of transformation keep us driven.</span>
            </div>

        </div>

        <div class="col">
            <div><!-- aboutus's Picture 1-->
                <img src="{{ asset('img/aboutus1.jpg') }}" alt="aboutus1" class="aboutus-image1">
            </div>
        </div>
    </div>
</div>

<div class="container about-story2" data-aos="zoom-in-right">
    <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
        <div class="col aboutus2">
            <div><!-- aboutus's Picture 2-->
                <img src="{{ asset('img/aboutus2.jpg') }}" alt="aboutus2" class="aboutus-image2">
            </div>

        </div>

        <div class="col story2">
            <div>
                <div>
                  <span>Meet <strong>Sarah, a survivor of heart disease</strong>. Through the generosity of donors like you, we were able to provide life-saving treatment and support her on the journey to recovery. Sarah's story is just one example of the impact we can make together.</span>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container about-story3" data-aos="zoom-in-left">
    <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
        <div class="col story3">
            <div>

                <div>

                    <span>From humble beginnings, our organization has grown, forming partnerships with local communities and international organizations. Together, we've responded to natural disasters, rescued animals from abusive situations, and brought hope to countless lives.</span>
                </div>
            </div>
        </div>

        <div class="col aboutus1">
            <div><!-- aboutus's Picture 3-->
                <img src="{{ asset('img/aboutus3.jpg') }}" alt="aboutus3" class="aboutus-image3">
            </div>
        </div>
    </div>
</div>

<div class="container about-story4" data-aos="zoom-in-right">
    <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
        <div class="col aboutus2">
            <div><!-- aboutus's Picture 4-->
                <img src="{{ asset('img/aboutus4.jpg') }}" alt="aboutus4" class="aboutus-image4">
            </div>

        </div>

        <div class="col story4">
            <div>
                <div>
                  <span>Our commitment to transparency means that every donation you make goes directly to where it's needed most. We envision a future where diseases are eradicated, animals are treated with compassion, and communities stand resilient in the face of disasters.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container about-story5" data-aos="fade-up">
    <div class="row row-cols-1 row-cols-md-2 g-10 align-items-center">
        <div class="col story5">
            <div>
                <div>

                    <span>Join us on this incredible journey. Your support can be the turning point in someone's life, and together, we can create a world where every individual, human or animal, has the opportunity to thrive</span>
                </div>
            </div>
        </div>

        <div class="col aboutus1">
            <div><!-- aboutus's Picture 5-->
                <img src="{{ asset('img/aboutus5.jpg') }}" alt="aboutus5" class="aboutus-image5">
            </div>
        </div>
    </div>
</div>

<br>
{{-- Map Section --}}
<div class="container mt-3 aboutus_map_section">
    <div class="row">
        <div class="col-md-6 aboutus-text">
            <h2>Our Journey</h2>
            <p>At <strong>StayHopeFul</strong>, we are on a mission to create positive change across multiple fronts. Our commitment extends to promoting sustainability, empowering communities by providing access to education, healthcare, and economic opportunities, delivering humanitarian aid in times of crisis, advocating for the welfare of animals, and working towards global health equity.</p>
            <p>Explore the map below to see the tangible impact of our initiatives. Each marked location represents a step forward in our journey towards a better, more sustainable world. Join us in making a difference for the communities, ecosystems, and lives we serve.</p>
        </div>
        <div class="col-md-6 aboutus-map">
            @include('frontend.aboutus.aboutus_map')
        </div>
    </div>
</div>

<br>
{{-- logo_company --}}
<div class="container mt-3 aboutus-logo">
    <div class="position-relative py-2 px-4 col-md-6 offset-md-3 logo_info">
        Our vision extends beyond immediate impact. We're committed to sustainable solutions that stand the test of time. Your support not only transforms lives but also contributes to a more resilient and sustainable future. At <strong>StayHopeful</strong>, we partner with organizations that share our dedication to environmental well-being.
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1" fill="var(--bs-secondary)" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
    </div>
    <br>
    <div class="row align-items-center">
        <div class="col">
            <a href="https://www.independent.co.uk/asia"><img src="{{ asset('img/logo_aboutus/logo_company1.PNG') }}" alt="logo_company1.PNG" class="logo_company"></a>
        </div>
        <div class="col">
            <a href="https://www.theguardian.com/international"><img src="{{ asset('img/logo_aboutus/logo_company2.PNG') }}" alt="logo_company2.PNG" class="logo_company"></a>
        </div>
        <div class="col">
            <a href="https://www.cbsnews.com/"><img src="{{ asset('img/logo_aboutus/logo_company3.jpg') }}" alt="logo_company3.jpg" class="logo_company"></a>
        </div>
        <div class="col ">
            <a href="https://nypost.com/"><img src="{{ asset('img/logo_aboutus/logo_company4.PNG') }}" alt="logo_company3.jpg" class="logo_company"></a>
        </div>
        <div class="col ">
            <a href="https://www.usnews.com/"><img src="{{ asset('img/logo_aboutus/logo_company5.jpg') }}" alt="logo_company3.jpg" class="logo_company"></a>
        </div>
        <div class="col ">
            <a href="https://e.vnexpress.net/"><img src="{{ asset('img/logo_aboutus/logo_company6.PNG') }}" alt="logo_company3.jpg" class="logo_company"></a>
        </div>
    </div>
</div>

{{-- call to action sector --}}
<div class="container mt-3 call_to_action">
    <h3>Join Us in Making a Difference!</h3>
    <p>Together, we can create positive change and make a lasting impact. Your support matters.</p>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col" data-aos="fade-left" data-aos-duration="1000">
            <div class="card">
                <br>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg"  width="100" height="100" viewBox="0 0 512 512">
                        <style>svg{fill:#15b5f9}</style><path d="M256 48a160 160 0 1 1 0 320 160 160 0 1 1 0-320zm0 368A208 208 0 1 0 256 0a208 208 0 1 0 0 416zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.6-64-64-64c-13.6 18.2-29.8 34.3-48 48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V416c0-8.8 7.2-16 16-16h48c-18.2-13.7-34.3-29.8-48-48zM276 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z"/>
                    </svg>
                </div>
                <div class="card-body call_to_action_card">
                    <h5 class="card-title">Donate To Save Lives</h5>
                    <p class="card-text card-text-p">Your contribution can make a life-saving impact. By donating now, you help us provide crucial support and resources to those in need. Join us, and let's make a difference together.</p>
                    <a href="{{ route('detail.donate') }}" class="btn btn-info call_to_action_button">Donate</a></p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

            <div class="card">
                <br>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                        <style>svg{fill:#15b5f9}</style><path d="M396.6 6.5L235.8 129.1c9.6 1.8 18.9 5.8 27 12l168 128c13.2 10.1 22 24.9 24.5 41.4l6.2 41.5H608c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128c-11.5-8.7-27.3-8.7-38.8 0zm-153.2 160c-11.5-8.7-27.3-8.7-38.8 0l-168 128c-6.6 5-11 12.5-12.3 20.7l-24 160c-1.4 9.2 1.3 18.6 7.4 25.6S22.7 512 32 512H224V352l96 160h96c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128z"/>
                    </svg>
                </div>

                <div class="card-body call_to_action_card">
                    <h5 class="card-title">Join Our Community for Exclusive Updates.</h5>
                    <p class="card-text card-text-p">Become a part of our community to receive exclusive updates and be the first to know about our impactful initiatives.</p>
                    <a href="{{route ('volunteer.index')}}" class="btn btn-info call_to_action_button">Volunteer</a></p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">

            <div class="card">
                <br>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                        <style>svg{fill:#15b5f9}</style><path d="M544 248v3.3l69.7-69.7c21.9-21.9 21.9-57.3 0-79.2L535.6 24.4c-21.9-21.9-57.3-21.9-79.2 0L416.3 64.5c-2.7-.3-5.5-.5-8.3-.5H296c-37.1 0-67.6 28-71.6 64H224V248c0 22.1 17.9 40 40 40s40-17.9 40-40V176c0 0 0-.1 0-.1V160l16 0 136 0c0 0 0 0 .1 0H464c44.2 0 80 35.8 80 80v8zM336 192v56c0 39.8-32.2 72-72 72s-72-32.2-72-72V129.4c-35.9 6.2-65.8 32.3-76 68.2L99.5 255.2 26.3 328.4c-21.9 21.9-21.9 57.3 0 79.2l78.1 78.1c21.9 21.9 57.3 21.9 79.2 0l37.7-37.7c.9 0 1.8 .1 2.7 .1H384c26.5 0 48-21.5 48-48c0-5.6-1-11-2.7-16H432c26.5 0 48-21.5 48-48c0-12.8-5-24.4-13.2-33c25.7-5 45.1-27.6 45.2-54.8v-.4c-.1-30.8-25.1-55.8-56-55.8c0 0 0 0 0 0l-120 0z"/>
                    </svg>
                </div>

                <div class="card-body call_to_action_card">
                    <h5 class="card-title">Support Our Cause Volunteer Today</h5>
                    <p class="card-text card-text-p">Join us in supporting our cause and contribute to positive change. Your dedication can help us bring hope, healing, and resilience to those who need it most.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-info call_to_action_button">Contact</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Our Team sector --}}
<div class="container-fluid mt-3 aboutus_our_team" data-aos="fade-right">
    <h2 class="aboutus-h2">Who We Are</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <span>
                Welcome to <strong>StayHopeful</strong>, where our journey towards positive change began 2018. Over the years, we've evolved into a <strong>Empowering Communities: A Hub for Positive Change and Growth</strong> dedicated to making a lasting impact.
            </span>
            <br>
            <span>
                Our story started with a vision held passionately by <strong>John Doe</strong>. Fueled by the potential to leverage technology, they laid the foundation for <strong>StayHopeful</strong> with the belief that will make a better Tomorrow.
            </span>
        </div>
    </div>
    <br>
    <div class="row align-items-center aboutus_johndoe">
        <div class="col d-none d-lg-block">
            <img class="founder-img1" src="{{ asset('img/aboutus_founder1.jpg') }}" alt="founder1" >
        </div>
        <div class="col">
            <div class="card mb-3 aboutus_card_johndoe">
                <img class="founder-img" src="{{ asset('img/aboutus_founder.jpg') }}" alt="founder">
                <div class="card-body">
                  <h5 class="card-title">John Doe</h5>
                  <p class="card-text">John Doe, now known as The Founder, stands at the helm of a thriving online platform. Born from a fusion of passion and purpose, the platform has become a virtual nexus where donors and causes converge</p>
                  <a href="{{route("aboutus.aboutus_whoweare")}}" class="btn btn-info our-team-button">Our Team</a>
                </div>
              </div>
        </div>
        <div class="col d-none d-lg-block">
            <img class="founder-img2" src="{{ asset('img/aboutus_founder2.jpg') }}" alt="founder2">
        </div>
    </div>
</div>
<hr>
{{-- Accordion sector--}}
<div class="container mt-3" data-aos="zoom-in">
    <h2>Questions you often encounter</h2>
    {{-- Accordion --}}
    <div class="accordion" id="projectAccordion">
        <!-- Projects Funded -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="projectFundedHeading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#projectFundedCollapse" aria-expanded="true" aria-controls="projectFundedCollapse">
                    <i class="bi bi-check-square"></i> 1. How Can I Make a Donation
                </button>
            </h2>
            <div id="projectFundedCollapse" class="accordion-collapse collapse show" aria-labelledby="projectFundedHeading" data-bs-parent="#projectAccordion">
                <div class="accordion-body">
                    To make a donation, simply click on the <a href="{{ route('detail.donate') }}" style="text-decoration: none">"Donate"</a> button on our homepage. You'll be guided through a secure process to choose your donation amount and payment method.
                </div>
            </div>
        </div>

        <!-- People Served -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="peopleServedHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#peopleServedCollapse" aria-expanded="false" aria-controls="peopleServedCollapse">
                    <i class="bi bi-person"></i> 2. Where Does My Money Go?
                </button>
            </h2>
            <div id="peopleServedCollapse" class="accordion-collapse collapse" aria-labelledby="peopleServedHeading" data-bs-parent="#projectAccordion">
                <div class="accordion-body">
                    Your donation makes a meaningful impact across critical areas. By supporting our Environmental Nonprofit, Humanitarian Aid Organization, and Animal Welfare initiatives, you are directly contributing to positive change. Our commitment to transparency means that funds are allocated to specific programs, including Patient Support and Care for those battling illnesses, Emergency Relief to aid communities in crisis, and Rehabilitation and Support for those rebuilding their lives. Together, we can create a lasting and transformative impact on the environment, humanity, and the welfare of animals. Thank you for being a vital part of our mission
                </div>
            </div>
        </div>

        <!-- Countries Impacted -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="countriesImpactedHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#countriesImpactedCollapse" aria-expanded="false" aria-controls="countriesImpactedCollapse">
                    <i class="bi bi-globe"></i> 3. Can I Specify How I Want My Donation to be Used?
                </button>
            </h2>
            <div id="countriesImpactedCollapse" class="accordion-collapse collapse" aria-labelledby="countriesImpactedHeading" data-bs-parent="#projectAccordion">
                <div class="accordion-body">
                    Certainly! During the donation process, you can indicate any preferences or specify a particular program you'd like your donation to support
            </div>
        </div>

        <!-- Challenges Faced -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="challengesFacedHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#challengesFacedCollapse" aria-expanded="false" aria-controls="challengesFacedCollapse">
                    <i class="bi bi-exclamation-circle"></i> 4. How Can I Contact StayHopeful for More Information?
                </button>
            </h2>
            <div id="challengesFacedCollapse" class="accordion-collapse collapse" aria-labelledby="challengesFacedHeading" data-bs-parent="#projectAccordion">
                <div class="accordion-body">
                    For more information, feel free to reach out to our team at <a href="mailto:contact@StayHopeful.org" style="text-decoration: none">contact@StayHopeful.org</a> or call us at Hotline :<a href="tel:+842839107612" style="text-decoration: none">+84-28 3910 7612</a> or  Fax :<a href="tel:+8402839107614" style="text-decoration: none">84-028 3910 7614</a>. We're here to assist you.
                </div>
            </div>
        </div>

        <!-- Future Plans -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="futurePlansHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#futurePlansCollapse" aria-expanded="false" aria-controls="futurePlansCollapse">
                    <i class="bi bi-arrow-right-circle"></i> 5. How Can I Get Involved Beyond Donating?
                </button>
            </h2>
            <div id="futurePlansCollapse" class="accordion-collapse collapse" aria-labelledby="futurePlansHeading" data-bs-parent="#projectAccordion">
                <div class="accordion-body">
                    We appreciate your interest! Explore volunteer opportunities, attend events, or share our mission on social media to help us reach more supporters
                </div>
            </div>
        </div>
    </div>
</div>


    @include('frontend/login/login');
    @include('frontend/profile/popup_profile');
@endsection
