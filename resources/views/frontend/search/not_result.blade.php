@extends('frontend.site')
@section('title', 'Projects')
@section('main')
    @include('frontend.info_donate.info_donate')

    {{-- css --}}
    <link rel="stylesheet" href="{{asset('blogcss/blog_finished.css')}}">
    {{-- css --}}
    
    <div class="container" style="margin-top: 100px">
        <div class="row">
            @include('frontend.search.search_input')
            <div style="background-color: #f8f5f5; border-radius: 10px; box-shadow: 0 0 10px #ccc">
                <h1 style="font-size: 25px; color:rgb(70,145,206)">Search: {{$keywork}}</h1>
                <span>No results found.</span>
            </div>
        </div>
    </div>


    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
