@extends('frontend.site')
@section('title', 'detail_member')
@section('main')

<link rel="stylesheet" href="{{ asset('aboutuscss/detail_member.css') }}">

<div class="container aboutus_detail d-flex align-items-center">
  <div class="card mb-3" style="max-width: 1170px; margin-left: 6%;">
      <div class="row g-0">
          <div class="col-md-4 d-none d-lg-block">
              @if ($teamMember->images->count() > 0)
                  <img src="{{ asset($teamMember->images[0]->url_image) }}" class="img-fluid rounded-start" alt="{{ $teamMember->name }}">
              @endif
          </div>
          <div class="col-md-8 aboutus_detail_button">
              <div class="card-body d-flex flex-column justify-content-center">
                  <h3 class="card-title">{{ $teamMember->name }}</h3>
                  <p class="card-text"><strong>Age:</strong> {{ $teamMember->age }}</p>
                  <p class="card-text"><strong>Email:</strong> <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a></p>
                  <p class="card-text"><strong>Role:</strong> {{ $teamMember->skill }}</p>
                  <p class="card-text "><strong>Description:</strong> {{ $teamMember->description }}</p>
                  <p class="card-text"><small class="text-muted">Last updated: {{ $teamMember->updated_at->diffForHumans() }}</small></p>
                  <a href="{{ route('aboutus.aboutus_whoweare') }}" class="btn btn-primary align-self-center">Back to Team</a>
              </div>
          </div>
      </div>
  </div>
</div>

@include('frontend/login/login');
@endsection
