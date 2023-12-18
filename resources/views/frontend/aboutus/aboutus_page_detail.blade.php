@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <h1>About Us Detail Page</h1>
    <br>
    <div class="btn__back">
        <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>
    <br>
    <div class="card">
        <div class="card-body text-center">
            @if ($aboutusmain)
                <h5 class="card-title">{{ $aboutusmain->title }}</h5>
                <p class="card-text">{{ $aboutusmain->description }}</p>
                @if ($aboutusmain->images->count() > 0)
                    @foreach ($aboutusmain->images as $image)
                        <img src="{{ asset($image->url_image) }}" class="card-img-top img-fluid mx-auto d-block" alt="Image" style="max-width: 30%;">
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>

@include('frontend/login/login')
@endsection