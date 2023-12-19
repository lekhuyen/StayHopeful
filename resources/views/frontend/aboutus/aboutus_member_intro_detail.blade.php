@extends('frontend.site')
@section('title', 'Founder')
@section('main')

<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="{{ asset('aboutuscss/johndoe.css') }}">

<div class="btn__back">
    <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn__go_back">
        <i class="fa fa-long-arrow-left"></i>GO BACK</a>
</div>



        <div class="container mt-3 johndoe_introduction">
            <div class="card text-center">
                <h2 class="johndoe-h1">{{ $ourfounderPages->middletitle }}</h2>
                {{-- introduction_1 --}}
                <div class="row">
                    <div class="col-md-10 offset-md-1 introduction_1">
                        {{ $ourfounderPages->middledescription }}
                    </div>
                </div>
                <br>
                @if ($ourfounderPages->video)
                    <div class="container mt-3 video-container text-center">
                        <video width="60%" height="auto" controls>
                            <source src="{{ asset('storage/' . $ourfounderPages->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            </div>
        </div>



@include('frontend/login/login')
@endsection