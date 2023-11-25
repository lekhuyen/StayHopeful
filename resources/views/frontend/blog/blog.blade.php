@extends('frontend.site')
@section('title', 'Blog')
@section('main')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-8 new-page" style="padding-right: 20px; height: 100%;">
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="new_child" style="height: 160px;">
                    <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title">Lorem ipsum dolor sit amet consectetur Quis
                                quos cum nostrum vitae? 
                            </h3>
                        </div>
                        <div class="new-description">
                            <a href="#">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.?
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>

            {{-- slidebar --}}
            <div class="col-lg-4 nav-bar-right">
                @include('frontend.slide-bar.slide_bar',['categories'=>$categories], ['projects'=>$projects])  
            </div>
        </div>
    </div>
    @include("frontend/login/login");
@endsection
