@extends('frontend.site')
@section('title', 'Trang chủ')
    


@section('main')
<!-- carosel -->
<section>
    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="height:100vh;">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
                    <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/omg.jpeg')}}" alt="Los Angeles" class="d-block carosel_heigth">
                <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="{{asset('img/omg.jpeg')}}" alt="Chicago" class="d-block carosel_heigth">
            <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
            </div> 
            </div>
            <div class="carousel-item">
            <img src="{{asset('img/omg.jpeg')}}" alt="New York" class="d-block carosel_heigth">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>  
            </div>
        </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>CÁC SỰ KIỆN GẦN NHẤT</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- card -->
<div class="container">
    <div class="row">
        <div class=" col-xxl-4 col-xl-6 col-lg-6 large ">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 26rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body card-body-1">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-4 col-xl-6 col-lg-6 large">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 26rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-4 col-xl-6 col-lg-6 large">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 26rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
    
    </div>
</div>


<!-- su kien gan nhat -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>CÁC SỰ KIỆN ĐÃ HOÀN THÀNH</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- card -->
<div class="container">
    <div class="row">
        <div class="col-xxl-3 col-xl-6">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 19.5rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-6">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 19.5rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-6">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 19.5rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-6">
            <a href="#" class="a-card">
                <div class="card card_wapper" style="width: 19.5rem;">
                    <img src="{{asset('img/omg.jpeg')}}" class="card-img-top card-img-top-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title card-title-1" data-i18n="text1">Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà</h5>
                            <p class="card-text card-text-1-1" data-i18n="text2">Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh 
                                - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, 
                                điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang 
                                chăm sóc người con trai bị liệt ở nhà.
                            </p>
                            <p class="card-title-child">
                                Đã góp:
                                <span>
                                    22.378.000
                                </span> 
                            </p>
                            <p class="card-title-child-1">
                                Cần huy động: 
                                <span>
                                    22.000.000
                                </span> 
                            </p>
                            <a href="#" class="btn btn-primary btn-primary-1">CHI TIẾT</a>
                        </div>
                </div>
            </a>
        </div>
        
    
    </div>
</div>

<!-- video -->
<section>
    <div class="container section-title-1-0">
        <div class="row">
            <div class="col-lg-12 section-title-1">
                <div class="section-title_video">
                    <h4>THƯ VIỆN VIDEO</h4>
                </div>
                <div>
                    <a href="#">XEM TẤT CẢ</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-4 video_status">
            <video id="myVideo" src="{{asset('home/video/Video Cười để ghép video V.mp4')}}" controls width="400" height="200"></video>
            <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha hoặc mẹ hoặc cả hai</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 video_status">
            <video id="myVideo" src="{{asset('home/video/Video Cười để ghép video V.mp4')}}" controls width="400" height="200"></video>
            <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha hoặc mẹ hoặc cả hai</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 video_status">
            <video id="myVideo" src="{{asset('home/video/Video Cười để ghép video V.mp4')}}" controls width="400" height="200"></video>
            <a href="#" class="video_title">Người bạn lớn là một dự án có mục đích giúp đỡ Trẻ em không còn cha hoặc mẹ hoặc cả hai</a>
        </div>
    </div>
</div>

@stop()