@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <br>
    <br>
    <h1>Main Member Detail Page</h1>
    <br>
    <div class="btn__back">
        <a href="{{ route('aboutusmember.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK TO MEMBER PAGE</a>
    </div>
    <br>
    @if ($aboutusmember)
        <h3>Introduction Info:</h3>
        <div class="card">
            <div class="card-body text-center">
                <h1 class="text-center">{{ $aboutusmember->title }}</h1>

                <div class="col-md-10 offset-md-1 ">
                    <span>
                        {{ $aboutusmember->description }}
                    </span>
                </div>

                <div class="container mt-5 johndoe_card">
                    <div class="row mt-4">
                        <!-- Founder's Picture -->
                        <div class="col-md-4 text-center">
                            @if ($aboutusmember->images->count() > 0)
                                @foreach ($aboutusmember->images as $image)
                                    <img src="{{ asset($image->url_image) }}" class="card-img-top img-fluid mx-auto d-block" alt="Image" style="max-width: 60%;">
                                @endforeach
                            @endif
                        </div>
                        <!-- Introduction -->
                        <div class="col-md-8">
                            <br>
                            <p>
                                {{ $aboutusmember->leftdescription }}
                            </p>
                            <a href="#" class="btn btn-outline-info disabled">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <br>
    @if ($aboutusmember)
        <h3>Member Info:</h3>
        <div class="card">
            <div class="card-body text-center">
                    <h2 class="text-center">{{ $aboutusmember->middletitle }}</h2>

                    <div class="col-md-10 offset-md-1 ">
                        <span>
                            {{ $aboutusmember->middledescription }}
                        </span>
                    </div>
            </div>
        </div>
    @endif
    <br>

    @if ($aboutusmember && $aboutusmember->video)
        <h3>Video</h3>
        <div class="card">
            <div class="card-body text-center">
                <div class="col-md-10 offset-md-1">
                    <div class="video-container">
                        <video width="560" height="315" controls>
                            <source src="{{ asset('storage/' . $aboutusmember->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@include('frontend/login/login')
@endsection