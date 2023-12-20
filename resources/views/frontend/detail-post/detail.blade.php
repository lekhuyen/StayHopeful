@extends('frontend.comment.comment')
@section('detail-post')
@section('post-title')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('volunteercss/blog_detail.css') }}">
    {{-- css --}}

    <div class="container-fluid margin-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="display: flex; align-items:center">
                    <marquee>
                        <span style="font-size: 20px; margin-left: 20px; color:dodgerblue;">
                            Total Donate:
                        </span>
                        <span style="font-size: 20px; margin-left: 6px; color: dodgerblue; vertical-align: inherit">
                            {{ number_format($project->donateinfo->sum('amount'), 2) }}
                        </span>

                        @foreach ($project->donateinfo as $donation)
                            <span style="font-size: 20px; margin-left: 20px; color: dodgerblue;">
                                Mr. {{ $donation->name }}:
                            </span>
                            <span style="font-size: 20px; margin-left: 6px; color: dodgerblue; vertical-align: inherit">
                                {{ $donation->amount }}
                            </span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <div class="btn__back">
        <a href="{{ route('project.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 post-title">
                <h2>{{ $project->title }}</h2>
            </div>
        </div>
    @endsection


    <div class="col-lg-8 post-detail-1">
        {{-- @dd($checkUserProject); --}}

        <span>{!! $project->description !!}</span>
        @foreach ($project->images as $image)
            <img src="{{ asset($image->image) }}" alt="">
        @endforeach
        {{-- @dd($project->donateinfo->sum('amount')); --}}
        @if ($project->donateinfo->sum('amount') >= $project->money)
            <div class="donate_link">
                <button disabled>DONATE</button>
                @if ($checkUserProject)
                    <a href="" class= "btn_volunter_disabled">VOLUNTEER</a>
                @else
                    @if ($project->status_event == 1)
                        <a href="{{ route('volunteer.create') }}" class="btn_volunter">VOLUNTEER</a>
                    @else
                        <a href="" class= "btn_volunter_disabled">VOLUNTEER</a>
                    @endif
                @endif
            </div>
        @else
            <div class="donate_link">
                <a href="{{ route('detail.donate') }}">DONATE</a>

                @if ($checkUserProject)
                    <a href="" class= "btn_volunter_disabled">VOLUNTEER</a>
                @else
                    @if ($project->status_event == 1)
                        <a href="{{ route('volunteer.create') }}" class="btn_volunter">VOLUNTEER</a>
                    @else
                        <a href="" class= "btn_volunter_disabled">VOLUNTEER</a>
                    @endif
                @endif
            </div>
        @endif


    </div>
    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')

@endsection
