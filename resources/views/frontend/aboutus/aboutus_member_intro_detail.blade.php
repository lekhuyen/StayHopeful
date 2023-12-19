@extends('frontend.site')
@section('title', 'Founder')
@section('main')

<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="{{ asset('aboutuscss/johndoe.css') }}">

<div class="btn__back">
    <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn__go_back">
        <i class="fa fa-long-arrow-left"></i>GO BACK</a>
</div>

@foreach ($ourfounderPages as $founderitems)

    <div class="container mt-3 johndoe_introduction">
        <h2 class="johndoe-h1">{{ $founderitems->middletitle }}</h2>
        {{-- introduction_1 --}}

        <div class="row">
            <div class="col-md-10 offset-md-1 introduction_1">

                {{ $founderitems->middledescription }}
            </div>
        </div>
    </div>
@endforeach


@include('frontend/login/login')
@endsection