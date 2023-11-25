@extends('frontend.site')
@section('main')
    @include('frontend.info_donate.info_donate')

    <div class="container" style="margin-top: 30px">
        <div class="row">
            @if ($projects->count() > 0)
                @foreach ($projects as $project)
                    <div class="col-xxl-3 col-xl-6" style="margin-bottom: 20px">
                        <a href="{{route('detail.post', $project->id)}}" class="a-card">
                            <div class="card card_wapper" style="width: 19.5rem;">
                                @if($project->status == 0)
                                    <div class="project-status">ĐANG VẬN ĐỘNG</div>
                                @else
                                    <div class="project-status-finish">ĐÃ HOÀN THÀNH</div>
                                @endif

                                <img src="{{ asset($project->images[0]->image) }}" class="card-img-top card-img-top-1" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                    <div class="cart-description-post">
                                        <p class="card-text card-text-1-1" data-i18n="text2">{{strip_tags($project->description)}}
                                        </p>
                                    </div>
                                    <p class="card-title-child">
                                        Đã góp:
                                        <span>
                                            {{number_format($project->money2)}}
                                        </span>
                                    </p>
                                    <p class="card-title-child-1">
                                        Cần huy động:
                                        <span>
                                            {{number_format($project->money)}}
                                        </span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
    </div>


    @include('frontend/login/login');
@endsection
