@extends('frontend.site')
@section('title', 'About Us')
@section('main')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('aboutuscss/aboutus_whoweare.css') }}">
    {{-- Our Founder sector --}}
    <div class="btn__back">
        <a href="{{ route('aboutus.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>

@foreach ($ourfounderPages as $founderitems)
    @if ($founderitems->section === 'Founder')
        <div class="container our_founder " data-aos="zoom-in">
            <h1 class="text-center aboutus_ourfounder_h2">{{ $founderitems->title }}</h1>
            <div class="col-md-10 offset-md-1 our_founder">
                <span>
                    {{ $founderitems->description }}
                </span>
            </div>

            <div class="container mt-5 johndoe_card">
                <div class="row mt-4">
                    <!-- Founder's Picture -->
                    <div class="col-md-4 text-center">
                        @if ($founderitems->images->count() > 0)
                            @foreach ($founderitems->images as $image)
                                <img src="{{ asset($image->url_image) }}" class="card-img-top rounded-circle founder-img" alt="Image" style="max-width: 100%;">
                            @endforeach
                        @endif
                    </div>
                    <!-- Introduction -->
                    <div class="col-md-8">
                        <br>
                        <p>
                            {{ $founderitems->leftdescription }}
                        </p>
                        <a href="{{ route('aboutusintro.detail', $founderitems->id) }}" class="btn btn-outline-info btn__founder">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endif
@endforeach
    <!-- Team Members sector -->

    <!-- Robert Johnson Card -->
    <div class="container mt-3 robert_johnsonc_card">
        @foreach ($ourfounderPages as $founderitems)
            @if ($founderitems->section === 'Financial Team')
                <h1>{{ $founderitems->section }}</h1>
                <div class="col-md-10 offset-md-1">
                    <span>
                        {{ $founderitems->description }}
                    </span>
                </div>
                <br>
                <div class="row justify-content-center" data-aos="fade-right">
                    <div class="col-md-6">
                        <div class="card robert_johnsonc_picture">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($founderitems->images->count() > 0)
                                        @foreach ($founderitems->images as $image)
                                            <img src="{{ asset($image->url_image) }}" class="img-fluid rounded-start" alt="Image" style="max-width: 100%;">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $founderitems->title }}</h5>
                                        <p class="card-text">{{ $founderitems->leftdescription }}</p>
                                        <a href="{{ route('aboutusintro.detail', $founderitems->id) }}" class="btn btn-outline-info btn__founder">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <br>

        <!-- Financial Team Members -->
        <div class="row row-cols-1 row-cols-md-6 g-2 financial_team_members" data-aos="fade-right">
            @foreach ($teamMembers as $member)
                @if ($member->skill === 'Financial Team')
                    <div class="col">
                        <a href="{{ route('aboutus.aboutus_whoweare.detail', $member->id) }}" class="card-link">
                            <div class="card h-100">
                                @if ($member->images->count() > 0)
                                    <img src="{{ asset($member->images[0]->url_image) }}" class="aboutus-card-img-top"
                                        alt="{{ $member->name }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <hr class="whoweare_hr">

    <!-- Jane Smith Card -->
    <div class="container mt-3 jane_smith_card">
        @foreach ($ourfounderPages as $founderitems)
            @if ($founderitems->section === 'Marketing Team')
            <h1>{{ $founderitems->section }}</h1>
            <div class="col-md-10 offset-md-1">
                <span>
                    {{ $founderitems->description }}
                </span>
            </div>
                <br>
                <div class="row justify-content-center" data-aos="fade-right">
                    <div class="col-md-6">
                        <div class="card jane_smith_picture">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($founderitems->images->count() > 0)
                                        @foreach ($founderitems->images as $image)
                                            <img src="{{ asset($image->url_image) }}" class="img-fluid rounded-start" alt="Image" style="max-width: 100%;">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $founderitems->title }}</h5>
                                        <p class="card-text">{{ $founderitems->leftdescription }}</p>
                                        <a href="{{ route('aboutusintro.detail', $founderitems->id) }}" class="btn btn-outline-info btn__founder">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <br>

        <!-- Marketing Team Members -->
        <div class="row row-cols-1 row-cols-md-6 g-2 marketing_team_members" data-aos="fade-right">
            @foreach ($teamMembers as $member)
                @if ($member->skill === 'Marketing Team')
                    <div class="col">
                        <a href="{{ route('aboutus.aboutus_whoweare.detail', $member->id) }}" class="card-link">
                            <div class="card h-100">
                                @if ($member->images->count() > 0)
                                    <img src="{{ asset($member->images[0]->url_image) }}" class="aboutus-card-img-top"
                                        alt="{{ $member->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

    <hr class="whoweare_hr">

    <!-- Kai Greene Card -->
    <div class="container mt-3 kai_greene_card">
        @foreach ($ourfounderPages as $founderitems)
            @if ($founderitems->section === 'Lead Developer Team')
                <h1>{{ $founderitems->section }}</h1>
                <div class="col-md-10 offset-md-1">
                    <span>
                        {{ $founderitems->description }}
                    </span>
                </div>
                <br>
                <div class="row justify-content-center" data-aos="fade-right">
                    <div class="col-md-6">
                        <div class="card kai_greene_picture">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($founderitems->images->count() > 0)
                                        @foreach ($founderitems->images as $image)
                                            <img src="{{ asset($image->url_image) }}" class="img-fluid rounded-start" alt="Image" style="max-width: 100%;">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $founderitems->title }}</h5>
                                        <p class="card-text">{{ $founderitems->leftdescription }}</p>
                                        <a href="{{ route('aboutusintro.detail', $founderitems->id) }}" class="btn btn-outline-info btn__founder">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        @endforeach

        <br>

        <!-- Lead Developer Team Members -->
        <div class="row row-cols-1 row-cols-md-6 g-2 lead_developer_team_members" data-aos="fade-right">
            @foreach ($teamMembers as $member)
                @if ($member->skill === 'Lead Developer Team')
                    <div class="col">
                        <a href="{{ route('aboutus.aboutus_whoweare.detail', $member->id) }}" class="card-link">
                            <div class="card h-100">
                                @if ($member->images->count() > 0)
                                    <img src="{{ asset($member->images[0]->url_image) }}" class="aboutus-card-img-top"
                                        alt="{{ $member->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

    <hr class="whoweare_hr">

    <!-- Oliver Hudson Card -->
    <div class="container mt-3 oliver_hudson_card">
        @foreach ($ourfounderPages as $founderitems)
            @if ($founderitems->section === 'Creative Team')
                <h1>Creative Team</h1>
                <br>
                <div class="row justify-content-center" data-aos="fade-right">
                    <div class="col-md-6">
                        <div class="card oliver_hudson_picture">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($founderitems->images->count() > 0)
                                        @foreach ($founderitems->images as $image)
                                            <img src="{{ asset($image->url_image) }}" class="img-fluid rounded-start" alt="Image" style="max-width: 100%;">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $founderitems->title }}</h5>
                                        <p class="card-text">{{ $founderitems->leftdescription }}</p>
                                        <a href="{{ route('aboutusintro.detail', $founderitems->id) }}" class="btn btn-outline-info btn__founder">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach 

        <br>

        <!-- Creative Team Members -->
        <div class="row row-cols-1 row-cols-md-6 g-2 creative_team_members" data-aos="fade-right">
            @foreach ($teamMembers as $member)
                @if ($member->skill === 'Creative Team')
                    <div class="col">
                        <a href="{{ route('aboutus.aboutus_whoweare.detail', $member->id) }}" class="card-link">
                            <div class="card h-100 creative_team_card">
                                @if ($member->images->count() > 0)
                                    <img src="{{ asset($member->images[0]->url_image) }}" class="aboutus-card-img-top"
                                        alt="{{ $member->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <hr class="whoweare_hr">

    <div class="container mt-3 volunteer_team_members" data-aos="fade-right">
        <h1>Volunteer Member</h1>
        <br>
        <!-- Volunteer Team Members -->
        <div class="row row-cols-1 row-cols-md-6 g-2 volunteer_team_card">
            @foreach ($teamMembers as $member)
                @if ($member->skill === 'Volunteer')
                    <div class="col">
                        <a href="{{ route('aboutus.aboutus_whoweare.detail', $member->id) }}" class="card-link">
                            <div class="card h-100">
                                @if ($member->images->count() > 0)
                                    <img src="{{ asset($member->images[0]->url_image) }}" class="aboutus-card-img-top"
                                        alt="{{ $member->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script>
        AOS.init();
    </script>
@include('frontend/login/login')
@include('frontend/profile/popup_profile')@endsection
