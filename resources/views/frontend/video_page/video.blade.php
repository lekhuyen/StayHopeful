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
            <div class="col-lg-12 video-parent">
                <video id="myVideo" src="{{ asset('home/video/video2.mp4') }}" controls width="100%"
                    height="500"></video>
            </div>
        </div>
    </div>

    {{-- video nho --}}
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px;">
                <video id="myVideo" src="{{ asset('home/video/video3.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px;">
                <video id="myVideo" src="{{ asset('home/video/video4.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px">
                <video id="myVideo" src="{{ asset('home/video/video5.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px">
                <video id="myVideo" src="{{ asset('home/video/video6.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px">
                <video id="myVideo" src="{{ asset('home/video/video7.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 video_status video-child" style="margin-bottom: 30px">
                <video id="myVideo" src="{{ asset('home/video/video8.mp4') }}" width="400" height="200"></video>
                <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha
                    hoặc mẹ hoặc cả hai</a>
                {{-- icon --}}
                <div class="video-icon-youtube">
                    <i class="fa-brands fa-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
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
@endsection
