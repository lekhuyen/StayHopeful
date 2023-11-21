@extends('frontend.site')
@section('title', 'Chi tiết')

@section('main')

    @include('frontend.info_donate.info_donate')

    <div class="container-fluid">
        {{-- post title --}}
        @yield('post-title')

        <div class="container post-detail">
            <div class="row">
                {{-- detail - post --}}
                @yield('detail-post')
                
                
                <!-- sidebar -->
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
                            <img src="{{ asset('img/omg.jpeg') }}" alt="">
                        </div>
                        <div class="post-title-child">
                            <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
                        </div>
                    </div>
                    <div class="post_related">
                        <div>
                            <img src="{{ asset('img/omg.jpeg') }}" alt="">
                        </div>
                        <div class="post-title-child">
                            <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
                        </div>
                    </div>
                    <div class="post_related">
                        <div>
                            <img src="{{ asset('img/omg.jpeg') }}" alt="">
                        </div>
                        <div class="post-title-child">
                            <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
                        </div>
                    </div>
                    <div class="post_related">
                        <div>
                            <img src="{{ asset('img/omg.jpeg') }}" alt="">
                        </div>
                        <div class="post-title-child">
                            <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
                        </div>
                    </div>
                    <div class="post_related">
                        <div>
                            <img src="{{ asset('img/omg.jpeg') }}" alt="">
                        </div>
                        <div class="post-title-child">
                            <a href="#">Khám bệnh từ thiện tại xã PomPen, TP. Sài gòn</a>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
    

    {{-- comment --}}
    <div class="modal-comment">
        {{-- -------------------- --}}
        <div class="modal_inner">
            <div class="comment-header">
                <h1>Comments</h1>
                <div class="close-icon">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="comment-body">
                {{-- comm cha --}}
                <div class="comment-user">
                    <a href='#' class="avatar-user">
                        <img src="{{asset('img/omg.jpeg')}}" alt="" width="100">
                    </a>
                    <div class="comment-user-info">
                        <div class="comment-user-comment">
                            <p>Khuyen</p>
                            <div class="comment-content">
                                <span>noi dung binh luan</span>
                            </div>
                        </div>
                        
                        <div class="comment-reply">
                            Trả lời
                        </div>
                    </div>
                    <div class="delete-edit-icon">
                        <div class="choose-icon">
                            <i class="fa-solid fa-ellipsis"></i>
                        
                        </div>
                    </div>
                    <div class="delete-edit-comment-1">
                        <div class="delete-edit-comment">
                            <ul>
                                <li>Sửa</li>
                                <li>Xóa</li>
                            </ul>
                        </div>
                        <div class="arrow">
                            <svg height="50" viewBox="0 0 25 12" width="35" class="x10l6tqk xng853d xu8u0ou" fill="var(--card-background)" 
                                style="transform: scale(1, -1) translate(0px, 0px);">
                                <path d="M24.553.103c-2.791.32-5.922 1.53-7.78 3.455l-9.62 7.023c-2.45 2.54-5.78 1.645-5.78-2.487V2.085C1.373 1.191.846.422.1.102h24.453z">
                                    </path>
                                </svg>
                        </div>
                    </div>
                    
                </div>

                {{-- comment con cap 1 --}}
                <div class="comment-user" style="padding-left: 60px">
                    <a href='#' class="avatar-user">
                        <img src="{{asset('img/omg.jpeg')}}" alt="" width="100">
                    </a>
                    <div class="comment-user-info">
                        <div class="comment-user-comment">
                            <p>Khuyen</p>
                            <div class="comment-content">
                                <span>noi dung binh luan</span>
                            </div>
                        </div>
                        
                        <div class="comment-reply">
                            Trả lời
                        </div>
                    </div>
                    <div class="delete-edit-icon">
                        <div class="choose-icon">
                            <i class="fa-solid fa-ellipsis"></i>
                        
                        </div>
                    </div>
                    <div class="delete-edit-comment-1">
                        <div class="delete-edit-comment">
                            <ul>
                                <li>Sửa</li>
                                <li>Xóa</li>
                            </ul>
                        </div>
                        <div class="arrow">
                            <svg height="50" viewBox="0 0 25 12" width="35" class="x10l6tqk xng853d xu8u0ou" fill="var(--card-background)" 
                                style="transform: scale(1, -1) translate(0px, 0px);">
                                <path d="M24.553.103c-2.791.32-5.922 1.53-7.78 3.455l-9.62 7.023c-2.45 2.54-5.78 1.645-5.78-2.487V2.085C1.373 1.191.846.422.1.102h24.453z">
                                    </path>
                                </svg>
                        </div>
                    </div>
                    
                </div>
                {{-- end comm con --}}                
            </div>
            <div class="comment-status">
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-heart" style="display: none;"></i>
                <i class="fa-solid fa-share"></i>
            </div>
            <div class="comment-input">
                <input type="text" placeholder="Comment">
                <div class="comment-submit">
                    <button type="submit" disabled="disabled">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/countdonate.js')}}"></script>
@stop()