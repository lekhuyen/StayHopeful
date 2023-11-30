@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3" style="background-color:#fff; border-radius: 5px">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 30px; font-size: 20px;">
                <span>{{ $post->title }}</span>
            </div>
        </div>

        <div class="row" style="margin-top: 15px; padding-bottom: 30px;">
            @if ($post->images->count() > 0)
                @foreach ($post->images as $image)
                    <div class="col-lg-4" style="margin-bottom: 15px;">
                        <div>
                            <img width="100%"
                                height="300px"
                                src="{{ asset($image->image) }}"
                                alt="">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
