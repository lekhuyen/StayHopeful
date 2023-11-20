@extends('frontend.slide-right.slide_right')
@section('title', 'Blog')
@section('detail-post')
    <!-- navbar for PJ  -->

    {{-- <div class="container-fluid" style="text-align: center; padding: 60px 0 0 0">
        <div class="col-lg-12">
            <div>
                <nav class="blogNav">
                    <ul>
                        <li><a href="#">Latest Projects</a></li>
                        <li><a href="#">Finished Projects</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="blog-image">
                        <div class="img-blog">
                            <img class="postimg" alt="Card image" src="{{ asset('img/tramanh1.jpg') }}">
                        </div>
                        <div id="imgIcon"><i class="far fa-heart"></i></div>
                        <div class="blog-flex">
                            <div class="blog">
                                <span id="title">TITLE</span>
                                <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                            </div>
                            <div class="blog-text">
                                <span class="description">Description</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="blog-image">
                        <div class="img-blog">
                            <img class="postimg" alt="Card image" src="{{ asset('img/tramanh1.jpg') }}">
                        </div>
                        <div id="imgIcon"><i class="far fa-heart"></i></div>
                        <div class="blog-flex">
                            <div class="blog">
                                <span id="title">TITLE</span>
                                <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                            </div>
                            <div class="blog-text">
                                <span class="description">Description</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="blog-image">
                        <div class="img-blog">
                            <img class="postimg" alt="Card image" src="{{ asset('img/tramanh1.jpg') }}">
                        </div>
                        <div id="imgIcon"><i class="far fa-heart"></i></div>
                        <div class="blog-flex">
                            <div class="blog">
                                <span id="title">TITLE</span>
                                <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                            </div>
                            <div class="blog-text">
                                <span class="description">Description</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-4 col-md-4 p-5">
        <div class="blog-detail-img">
            <div class="row"> --}}
                <div class="col-lg-4 col-md-6" style="padding: 0; background-color: aqua; height: 200px; display: flex;">
                    <img src="{{ asset('img/tramanh1.jpg') }}" class="blog-detail-img-2" style="width: 40%; height: 100%; padding: 10px;">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title" style="font-size: 15px">Lorem ipsum dolor sit amet consectetur Quis quos cum nostrum vitae? </h3>
                            <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                        </div>
                        <div  style=" overflow: hidden; text-overflow: ellipsis; 
                                        display: -webkit-box; -webkit-line-clamp: 4; 
                                        -webkit-box-orient: vertical; padding-left: 10px; margin-top: 15px;"
                                        
                                        >
                            <a style="">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.? 
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates 
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="padding: 0; background-color: aqua; height: 200px; display: flex;">
                    <img src="{{ asset('img/tramanh1.jpg') }}" class="blog-detail-img-2" style="width: 40%; height: 100%; padding: 10px;">
                    <div>
                        <div class="blog-detail-detail ">
                            <h3 id="title" style="font-size: 15px">Lorem ipsum dolor sit amet consectetur Quis quos cum nostrum vitae? </h3>
                            <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                        </div>
                        <div  style=" overflow: hidden; text-overflow: ellipsis; 
                                        display: -webkit-box; -webkit-line-clamp: 4; 
                                        -webkit-box-orient: vertical; padding-left: 10px; margin-top: 15px;"
                                        
                                        >
                            <a style="">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.? 
                                Magnam velit odio consequuntur dolore cumque ea non, distinctio molestiae id voluptates 
                                tenetur mollitia repellat voluptatem minima?
                            </a>
                        </div>
                    </div>
                </div>
                
                
            {{-- </div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-md-4 p-5">
        <div class="blog-detail-img">
            <div class="row">
                <div class="col-lg-6 col-md-6" style="padding: 0">
                    <img src="{{ asset('img/tramanh1.jpg') }}" class="blog-detail-img-2">
                </div>
                <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                    <div class="blog-detail-detail ">
                        <span id="title">TITLE</span>
                        <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




@endsection
