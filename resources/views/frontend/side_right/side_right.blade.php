@extends('frontend.detailpost.detail')

@section('sidebar')
    <div class="col-lg-4 nav-bar-right">

        <div class="btn-search">
            <div class="btn-search-1">
                <input type="text">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>

        <div class="menu-bar">
            <div class="item">
                <a href="{{ route('/') }}" class="menu-title-a">TRANG CHỦ</a>
            </div>
            <div class="item">
                <a class="menu-title-a">GIỚI THIỆU</a>
                <i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="" class="sub-item">Tin tuc 1</a>
                    <a href="" class="sub-item">Tin tuc 2</a>
                    <a href="" class="sub-item">Tin tuc 3</a>
                </div>
            </div>

            <div class="item">
                <a class="menu-title-a">ĐÓNG GÓP</a>
                <i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="" class="sub-item">Tin tuc 1</a>
                    <a href="" class="sub-item">Tin tuc 2</a>
                    <a href="" class="sub-item">Tin tuc 3</a>
                </div>
            </div>
            <div class="item">
                <a class="menu-title-a">TIN TỨC</a>
                <i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="" class="sub-item">Tin tuc 1</a>
                    <a href="" class="sub-item">Tin tuc 2</a>
                    <a href="" class="sub-item">Tin tuc 3</a>
                </div>
            </div>
            <div class="item">
                <a class="menu-title-a">CHƯƠNG TRÌNH</a>
                <i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="" class="sub-item">Tin tuc 1</a>
                    <a href="" class="sub-item">Tin tuc 2</a>
                    <a href="" class="sub-item">Tin tuc 3</a>
                </div>
            </div>
        </div>


        <h2 class="title-middle">BÀI VIẾT LIÊN QUAN</h2>
        <div class="post_related">
            <div>
                <img src="{{ asset('img/tramanh1.jpg') }}" alt="">
            </div>
            <div class="post-title-child">
                <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
            </div>
        </div>
        <div class="post_related">
            <div>
                <img src="{{ asset('img/tramanh1.jpg') }}" alt="">
            </div>
            <div class="post-title-child">
                <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
            </div>
        </div>
        <div class="post_related">
            <div>
                <img src="{{ asset('img/tramanh1.jpg') }}" alt="">
            </div>
            <div class="post-title-child">
                <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
            </div>
        </div>
        <div class="post_related">
            <div>
                <img src="{{ asset('img/tramanh1.jpg') }}" alt="">
            </div>
            <div class="post-title-child">
                <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
            </div>
        </div>
        <div class="post_related">
            <div>
                <img src="{{ asset('img/tramanh1.jpg') }}" alt="">
            </div>
            <div class="post-title-child">
                <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
            </div>
        </div>

    </div>
@endsection
