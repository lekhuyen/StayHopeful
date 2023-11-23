@extends('frontend.site')
@section('title', 'Blog')
@section('main')

    <!-- navbar for PJ  -->

    <div class="container-fluid" style="text-align: center; padding: 60px 0 0 0">
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

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-5">
                    <div class="blog-detail-img">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" style="padding: 0">
                                <img src="{{ asset('img/omg.jpeg') }}" class="blog-detail-img-2">
                            </div>
                            <div class="col-lg-6 col-md-6" style="padding: 0; background: #c1e2fd;">
                                <div class="blog-detail-detail ">
                                    <span id="title">TITLE</span>
                                    <a href="#"><i id="icon-arrow" class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("frontend/login/login");
    @endsection
