@extends('frontend.site')
@section('title', 'detail_member')
@section('main')

{{-- <link rel="stylesheet" href="{{asset('aboutuscss/detail_member.css')}}"> --}}

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($teamMember->images->count() > 0)
                        <img src="{{ asset($teamMember->images[0]->url_image) }}" class="img-fluid rounded-start" alt="{{ $teamMember->name }}">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $teamMember->name }}</h3>
                        <p class="card-text"><strong>Age:</strong> {{ $teamMember->age }}</p>
                        <p class="card-text"><strong>Email:</strong> <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a></p>
                        <p class="card-text"><strong>Skill:</strong> {{ $teamMember->skill }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $teamMember->description }}</p>
                        <p class="card-text"><small class="text-muted">Last updated: {{ $teamMember->updated_at->diffForHumans() }}</small></p>
                        <a href="{{ route('aboutus.whoweare') }}" class="btn btn-primary">Back to Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('frontend/login/login');
@endsection
