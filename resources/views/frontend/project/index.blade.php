@extends('frontend.site')
@section('title', 'Projects')
@section('main')
    @include('frontend.info_donate.info_donate')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('blogcss/blog_finished.css') }}">
    {{-- css --}}
    
    <div class="container" style="margin-top: 100px">
        <div class="row">
            @include('frontend.search.search_input')
            
            @if ($projects->count() > 0)
                @foreach ($projects as $project)
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-" style="margin-bottom: 20px">
                        <a href="{{ route('detail.post', [$project->id, Str::slug($project->title) . '.html']) }}"
                            class="a-card">
                            <div class="card card_wapper" style="width: 19.5rem;">
                                @if ($project->status == 0)
                                    <div class="project-status">ON GOING</div>
                                @else
                                    <div class="project-status-finish">FINISHED</div>
                                @endif

                                <img src="{{ asset($project->images[0]->image) }}" class="card-img-top card-img-top-1"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title card-title-1">{{ $project->title }}</h5>
                                    <div class="cart-description-post">
                                        <p class="card-text card-text-1-1">{!! $project->description !!}
                                        </p>
                                    </div>
                                    <p class="card-title-child">
                                        Received:
                                        <span>
                                            ${{ number_format($project->donateInfo->sum('amount'), 2) }}
                                    </p>
                                    <p class="card-title-child-1">
                                        Goals:
                                        <span>
                                            ${{ number_format($project->money) }}
                                        </span>
                                    </p>
                                    <a href="{{ route('detail.post', [$project->id, Str::slug($project->title) . '.html']) }}"
                                        class="btn btn-primary btn-primary-1">Details</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="general__pagination">
                    {{ $projects->links() }}
                </div>

            @endif
        </div>
    </div>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
