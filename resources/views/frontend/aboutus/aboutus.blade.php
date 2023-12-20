@extends('frontend.site')
@section('title', 'About Us')
@section('main')
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="{{ asset('aboutuscss/aboutus.css') }}">

    <br>
    <br>
    {{-- Mission sector --}}
    <div class="container mt-3 about-main col-md-8 offset-md-2" data-aos="zoom-in-down">
        @foreach ($mainPages as $mainitem)
            <div>
                @if ($mainitem->section === 'Main Section')
                    <h1>{{ $mainitem->title }}</h1>
                    <div class="text-center">
                        <span>{{ $mainitem->description }}</span>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        @foreach ($mainitem->images as $image)
                            <img src="{{ asset($image->url_image) }}" alt="{{ $mainitem->title }}" style="width: 60%;">
                        @endforeach
                    </div>
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
    
        @foreach ($aboutUsPages as $aboutusmain)
            @if ($aboutusmain->section == 'aboutus' && $aboutUsCounter == 0)
                @php
                    $firstTitle = $aboutusmain->title;
                    $aboutUsCounter++;
                @endphp
            @endif
        @endforeach
    
        <div style="margin-top: 20px">
            @foreach ($mainPages as $mainitem)
                <div>
                    @if ($mainitem->section === 'About Us Section')
                        <h1>{{ $mainitem->title }}</h1>
                        <div class="text-center">
                            <span>{{ $mainitem->description }}</span>
                        </div>
                        @foreach ($mainitem->images as $image)
                            <img src="{{ asset($image->url_image) }}" alt="{{ $mainitem->title }}" class="aboutus-image-main" style="width: 100%; max-width: 800px;">
                        @endforeach

                    @endif
                </div>
                <br>
            @endforeach
            <br>
    
            @foreach ($aboutUsPages as $aboutusmain)
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
            @endforeach
        </div>
    </div>

    <br>
    <div class="container mt-3 aboutus-logo">
        @php
            $aboutUsCounter = 0;
            $firstTitle = null;
        @endphp
    
        @foreach ($logoPages as $aboutusmain)
            @if ($aboutusmain->section == 'logo' && $aboutUsCounter == 0)
                @php
                    $firstTitle = $aboutusmain->title;
                    $aboutUsCounter++;
                @endphp
            @endif
        @endforeach
    
        <div>
            @foreach ($mainPages as $mainitem)
                <div>
                    @if ($mainitem->section === 'Logo Section')
                        <h1>{{ $mainitem->title }}</h1>
                        <div class="text-center">
                            <span class="mission">{{ $mainitem->description }}</span>
                        </div>
                        <div class="text-center">
                            @foreach ($mainitem->images as $image)
                                <img src="{{ asset($image->url_image) }}" alt="{{ $mainitem->title }}" class="aboutus-image-main" style="width: 100%; max-width: 800px;">
                            @endforeach 
                        </div>

                    @endif
                </div>
                <br>
            @endforeach
        </div>
        <br>
        <div>

    
            @foreach ($logoPages as $aboutusmain)
                    <div class="row align-items-center">
                        @foreach ($aboutusmain->images as $image)
                            <div class="col-md-2 mb-3">
                                <img src="{{ asset($image->url_image) }}" alt="{{ $aboutusmain->title }}" class="aboutus-image-main img-fluid logo_company">
                            </div>
                        @endforeach
                    </div>
                    <br>
            @endforeach
        </div>
    </div>
    
    {{-- call to action sector --}}
    <div class="container mt-3 call_to_action">
        @foreach ($mainPages as $mainitem)
            <div>
                @if ($mainitem->section === 'Join Us Section')
                    <h1>{{ $mainitem->title }}</h1>
                    <div class="text-center">
                        <span class="mission">{{ $mainitem->description }}</span>
                    </div>
                    @foreach ($mainitem->images as $image)
                        <img src="{{ asset($image->url_image) }}" alt="{{ $mainitem->title }}" class="aboutus-image-main" style="width: 50%; max-width: 300px;">
                    @endforeach

                @endif
            </div>
            <br>
        @endforeach
        <br>

        @foreach ($leftcallPages as $aboutusmain)
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
                            <div class="card-body text-center ">
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
                            <div class="card-body text-center">
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
        
                            <div class="card-body text-center">
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

    {{-- Team Section --}}

    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-lg-4 d-none d-lg-block">
                @foreach ($teampic1Page as $teampic1)
                    @if ($teampic1->images->count() > 0)
                        <img src="{{ asset($teampic1->images[0]->url_image) }}" class="img-thumbnail" alt="Image"/>
                    @endif
                @endforeach
            </div>
    
            <div class="col-lg-4 d-flex justify-content-center">
                @foreach ($teamPage as $teamitems)
                    <div class="card mb-3 aboutus_card_johndoe">
                        <div class="text-center">
                            @if ($teamitems->images->count() > 0)
                                <img src="{{ asset($teamitems->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                            @endif
    
                            <h5 class="card-title">{{ $teamitems->middletitle }}</h5>
                            <p class="card-text">{{ $teamitems->middledescription }}</p>
                            <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn btn-outline-info btn-sm our_team_button">Our Team</a>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="col-lg-4 d-none d-lg-block">
                @foreach ($teampic2Page as $teampic2)
                    @if ($teampic2->images->count() > 0)
                        <img src="{{ asset($teampic2->images[0]->url_image) }}" class="img-thumbnail" alt="Image"/>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <hr>
    {{-- Accordion sector --}}
    <div class="container mt-3" data-aos="zoom-in">
        @foreach ($mainPages as $mainitem)
        <div>
            @if ($mainitem->section === 'Question Section')
                <h1>{{ $mainitem->title }}</h1>
                <div class="text-center">
                    <span>{{ $mainitem->description }}</span>
                </div>
                @foreach ($mainitem->images as $image)
                    <img src="{{ asset($image->url_image) }}" alt="{{ $mainitem->title }}" class="aboutus-image-main" style="width: 100%; max-width: 800px;">
                @endforeach

            @endif
        </div>
        <br>
    @endforeach

    {{-- Accordion --}}
    <div class="accordion" id="projectAccordion">
        <!-- Projects Funded -->
        @foreach ($questionPages as $index => $questionitems)
            <div class="accordion-item" id="accordionItem{{ $index }}">
                <h2 class="accordion-header" id="questionHeading{{ $questionitems->id }}">
                    <button class="accordion-button" type="button"
                        data-bs-toggle="collapse" data-bs-target="#questionCollapse{{ $questionitems->id }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="questionCollapse{{ $questionitems->id }}">
                        <i class="bi bi-check-square"></i>{{ $questionitems->title }}
                    </button>
                </h2>
                <div id="questionCollapse{{ $questionitems->id }}" class="accordion-collapse collapse @if($index === 0) show @endif"
                    aria-labelledby="questionHeading{{ $questionitems->id }}" data-bs-parent="#projectAccordion">
                    <div class="accordion-body">
                        {{ $questionitems->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function () {
            // Add the glowing effect to the first accordion item
            $('.accordion-item:first .accordion-button').addClass('glowing-accordion-item');
    
            // Remove the glowing effect from other items when an accordion button is clicked
            $('.accordion-button').on('click', function () {
                $('.accordion-button').removeClass('glowing-accordion-item');
                $(this).addClass('glowing-accordion-item');
            });
        });
    </script>
</div>



        @include('frontend/login/login')
        @include('frontend/profile/popup_profile')
    @endsection
