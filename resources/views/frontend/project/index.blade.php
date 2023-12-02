@extends('frontend.site')
@section('title', 'Projects')
@section('main')
    @include('frontend.info_donate.info_donate')

    <div class="container" style="margin-top: 30px">
        <div class="row">
            @if ($projects->count() > 0)
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-xxl-4 col-xl-3" style="margin-bottom: 20px">
                        <a href="{{route('detail.post', $project->id)}}" class="a-card">
                            <div class="card card_wapper" style="width: 19.5rem;">
                                @if($project->status == 0)
                                    <div class="project-status">ON GOING</div>
                                @else
                                    <div class="project-status-finish">FINISHED</div>
                                @endif

                                <img src="{{ asset($project->images[0]->image) }}" class="card-img-top card-img-top-1" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title card-title-1">{{ $project->title }}</h5>
                                    <div class="cart-description-post">
                                        <p class="card-text card-text-1-1" >{!! $project->description !!}
                                        </p>
                                    </div>
                                    <p class="card-title-child">
                                        Received:
                                        <span>
                                            {{ number_format($project->donateInfo->sum('amount')) }}                                        </span>
                                    </p>
                                    <p class="card-title-child-1">
                                        Goals:
                                        <span>
                                            {{number_format($project->money)}}
                                        </span>
                                    </p>
                                    <a href="{{route('detail.post', $project->id)}}" class="btn btn-primary btn-primary-1">Details</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{$projects->links()}}
            @endif
        </div>
    </div>


    @include('frontend/login/login');
@endsection
