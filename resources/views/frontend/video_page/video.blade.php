@extends('frontend.site')
@section('title', 'Thư viện Video')

@section('main')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 70px; border-bottom: 1px solid #ccc">
                <h3 style="font-size: 28px; color: #245abe; text-transform: uppercase"> THƯ VIỆN VIDEO</h3>
            </div>
        </div>
    </div>

    {{-- video lon --}}
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-lg-12 video-parent" id="myVideo-1">
                @if($videos->count() > 0)
                    <video id="mediaplay-myVideo" src="{{asset($videos[0]->video) }}" controls width="100%" height="500"></video>
                @endif
            </div>
        </div>
    </div>
    {{-- video nho --}}
    <div class="container" style="margin-top: 70px">
        <div class="row">
            @foreach ($videos as $video)
                @if ($video->video != $videos[0]->video)
                    <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px;">
                        <a href="#mediaplay-myVideo">
                            <video id="myVideo" src="{{ asset($video->video) }}" width="400" height="200"></video>
                            {{-- icon --}}
                            <div class="video-icon-youtube">
                                <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        var videoParent = document.querySelector('.video-parent video')
        var videoChild = document.querySelectorAll('.video-child video')

        videoChild.forEach((video, index) => {
            video.addEventListener('click', () => {
                videoParent.src = videoChild[index].src
                videoParent.play()
            })

        });
    </script>
    @include("frontend/login/login");
    @include('frontend/profile/popup_profile');
@endsection
