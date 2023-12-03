<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- favicon  --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.PNG') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.PNG') }}">

    <link rel="stylesheet" href="{{ asset('home/Home_style.css') }}">
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/detailPost/detailpost.css') }}">
    {{-- css contactus --}}
    <link rel="stylesheet" href="{{ asset('contactus/contact.css') }}">
    {{-- css aboutus --}}
    <link rel="stylesheet" href="{{ asset('aboutuscss/aboutus.css') }}">

    <link rel="stylesheet" href="{{ asset('home/Home_style.css') }}">
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/detailPost/detailpost.css') }}">



    {{-- css contactus --}}
    <link rel="stylesheet" href="{{ asset('contactus/contact.css') }}">

    {{-- cssblog --}}
    <link rel="stylesheet" href="{{ asset('blogcss/blog.css') }}">
    {{-- cssblog --}}
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js') }}"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- odometer --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-minimal.min.css"
        integrity="sha512-Jeqp8CoPCvf9tf/uWokfCTsFcv5BIhfTYaTTJA0NKn6B88zDSWe5d/9HTmZX63FGpGGQdB8Chg2khB96+wn4Tw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
        integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- odometer --}}
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- jquery --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid header-nav" style="padding-left: 0;">
        <div class="row">

            <div class="col-lg-12">
                <div style="position: fixed; z-index: 1000; width: 100%">

                    <!-- mobile interface -->
                    <div class="test-nav">
                        <div id="nav-toggle">
                            <div class="search-input-icon"
                                style="display: flex; align-items: center; justify-content: space-between;">
                                <div class="search-input-icon-child" style="display: flex; align-items: center;">
                                    <i class="fa-solid fa-bars"></i>
                                    <input type="text" placeholder="Tìm kiếm">
                                </div>

                                <div style="display: flex; align-items: center;">
                                    <button class="login-nav" style="margin-right: 5px;">SIGN UP</button>
                                    <button class="register-nav">LOGIN</button>
                                </div>
                            </div>
                        </div>

                        <div id="nav-mobile">
                            <div class="nav-mobile-interface">
                                <a href="{{ route('/') }}" class="nav-menu-title">HOME</a>
                            </div>

                            <div class="nav-mobile-interface">
                                <a class="nav-menu-title">ABOUT</a>
                                <i class="fas fa-angle-right dropdown"></i>
                                <div class="nav-sub-menu-title">
                                    <a href="{{ route('aboutus.index') }}" class="sub-item">About Us</a>
                                    <a href="{{route('blog.index')}}" class="sub-item">Blog</a>
                                    <a href="{{route('contact.index')}}" class="sub-item">Location</a>
                                </div>
                            </div>

                            <div class="nav-mobile-interface">
                                <a class="nav-menu-title" href="#">PROJECT</a>
                                <i class="fas fa-angle-right dropdown"></i>
                                <div class="nav-sub-menu-title">
                                    <a href="{{ route('project.index', 1) }}" class="sub-item">Recent Projects</a>
                                    <a href="{{ route('blog.blog_finished') }}" class="sub-item">Finished Projects</a>
                                    {{-- <a href="#" class="sub-item">Tin tuc 3</a> --}}
                                </div>
                            </div>
                            <div class="nav-mobile-interface">
                                <a href="#" class="nav-menu-title">DONATE</a>
                                <i class="fas fa-angle-right dropdown"></i>
                                <div class="nav-sub-menu-title">
                                    <a href="{{ route('detail.donate') }}" class="sub-item">Donate Form</a>
                                    <a href="{{ route('detail.listdonate') }}" class="sub-item">Donate List</a>
                                    {{-- <a href="" class="sub-item">Tin tuc 3</a> --}}
                                </div>
                            </div>

                            <div class="nav-mobile-interface">
                                <a class="nav-menu-title">BLOG</a>
                                <i class="fas fa-angle-right dropdown"></i>
                                <div class="nav-sub-menu-title">
                                    <a href="{{route('blog.index')}}" class="sub-item">News</a>
                                    <a href="" class="sub-item">Tin tuc 2</a>
                                    <a href="" class="sub-item">Tin tuc 3</a>
                                </div>
                            </div>
                            <div class="nav-mobile-interface">
                                <a href="#" class="nav-menu-title">CONTACT</a>
                                <i class="fas fa-angle-right dropdown"></i>
                                <div class="nav-sub-menu-title">
                                    <a href="{{ route('contact.index') }}" class="sub-item">Contact</a>
                                    <a href="{{ route('feedback.create') }}" class="sub-item">Feedback</a>
                                    <a href="{{route('detail.donate')}}" class="sub-item">Get Involved</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- desktop interface -->
                    <div style="position: relative;">
                        <ul class="nav_bar">
                            <li><a href="{{ route('/') }}">
                                    <div class="text">
                                        <img class="logo" src="{{asset('img/logo.PNG')}}" alt="" style="margin-left: 0;">
                                        HOME
                                    </div>
                                </a></li>
                            <li><a href="{{ route('aboutus.index') }}">
                                    <div class="text">ABOUT</div>
                                </a></li>
                            <li><a href="{{ route('project.index', 1) }}">
                                    <div class="text">PROJECT</div>
                                </a></li>
                            <li><a href="{{ route('detail.donate') }}">
                                    <div class="text">DONATE</div>
                                </a></li>
                            <li><a href="{{ route('blog.index') }}">
                                    <div class="text">BLOG</div>
                                </a></li>
                            <li><a href="{{ route('contact.index') }}">
                                    <div class="text">CONTACT</div>
                                </a>
                            </li>
                            <li class="profile-option">
                                    @if (session('userInfo'))
                                    <div class="text username">{{session('userInfo')['name']}}</div> 
                                    {{-- <a href="{{route('logout')}}">LOGOUT</a> --}}
                                    @else
                                    <div class="text popup-login">LOGIN</div>
                                    @endif
                            </li>
                            </div>
                        </ul>
                        @if (session('userInfo'))
                        <div class="profile-dropdown">
                            <ul>
                                <li><a href="{{route('auth.profile')}}">PROFILE</a></li>
                                <li><a href="{{ route('logout') }}">LOGOUT</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>

    <div>@yield('main')</div>

    {{-- footer --}}

    <div class="container-fluid" style="background-color: #1184c6; margin-top: 150px;">
        <div class="container">
            <div class="row" style="padding: 50px 0; color: white;">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>STAYHOPEFUL</h2>
                        <span>Charity Fund was established under Decision No. 24/QD-BNV dated January 5, 2018. Stay
                            Hopeful is an expanded version of Ho Chi Minh City Charity Fund. The Fund has a nationwide
                            scope of operations.
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>QUICK LINKS</h2>
                        <ul>
                            <li><a href="">Donate</a></li>
                            <li><a href="">Projects</a></li>
                            <li><a href="">Our Team</a></li>
                            <li><a href="">History</a></li>
                            <li><a href="">About StayHopeful</a></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>PROJECTS</h2>
                        <ul>
                            <li><a href="">Elderly Donation</a></li>
                            <li><a href="">Children Donation</a></li>
                            <li><a href="">Pet Donation</a></li>
                            <li><a href=""></a></li>
                            {{-- <li><a href=""></a></li>
                            <li><a href=""></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>STAYHOPEFUL CHARITY FUND</h2>
                        <ul>
                            <li><i class="fa-solid fa-map"></i>5th Floor, No. 7 – 9 – 11 Mai Thị Lựu Street, Đa Kao
                                Ward, District 1,
                                Hồ Chí Minh City</li>
                            <li><i class="fa-solid fa-phone"></i> Hotline : (84-028) 39107612 – Ext.227</li>
                            <li><i class="fa-solid fa-fax"></i> Fax : (84-028) 3910 7614</li>
                            <li><i class="fa-solid fa-envelope"></i>Email: contact@StayHopeful.org</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="footer-end">
        <div class="container container-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-end">
                        <h6>©2023 STAYHOPEFUL CHARITY FUND. All rights reserved.</h6>
                        <div class="media-icon">
                            <a href=""><i class="fa-brands fa-square-facebook"
                                    style="cursor: pointer; background-color: #3B5998; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-youtube"
                                    style="cursor: pointer; background-color: #e22b26; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-twitter"
                                    style="cursor: pointer; background-color: #0591fc; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-instagram"
                                    style="cursor: pointer; background-color: #d67d51; color: white;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('comment/comment.js') }}"></script>
<script src="{{ asset('js/header-nav.js') }}"></script>
<script>
    var profileOption = document.querySelector(".profile-option");
    var profileDropdown = document.querySelector(".profile-dropdown");
    profileOption.addEventListener("mouseover", function(){
        profileDropdown.classList.toggle("showOptionProfile");
        profileDropdown.style.transitionDuration = "0.5s";
    })
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>

