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
    <link rel="stylesheet" href="{{asset('aboutuscss/aboutus.css')}}">
    <link rel="stylesheet" href="{{ asset('home/Home_style.css') }}">
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/detailPost/detailpost.css') }}">
    {{-- css contactus --}}
    <link rel="stylesheet" href="{{ asset('contactus/contact.css') }}">
    {{-- css aboutus --}}

    <link rel="stylesheet" href="{{ asset('home/Home_style.css') }}">
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/detailPost/detailpost.css') }}">

    {{-- profile --}}
    <link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">

    {{-- cssblog --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> {{-- jquery --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid header-nav" style="padding: 0;">
        <div class="row">

            <div class="col-lg-12">
                <div style="position: fixed; z-index: 1000; width: 100%">
                    <!-- mobile interface -->
                    <div class="nav-mobile-container">
                        <input type="checkbox" name="" id="check">
                        <div class="logo-container">
                            {{-- <div class="logo-nav-mobile"> --}}
                            <img class="logo" src="{{ asset('img/logo.PNG') }}" alt="">
                            {{-- </div> --}}

                            <div class="search-input-icon" style="display: flex; align-items: center;">
                                <div class="search-input-icon-child" style="display: flex; align-items: center;">
                                    <input type="search" placeholder="Search" name="search" id="search"
                                        class="search-home">
                                    <div class="search-ajax" id="search-ajax" style="display: none">
                                    </div>

                                </div>
                            </div>
                            <div class="log-sign">
                                @if (session('userInfo'))
                                    <div class="btn-mobile solid popup-profile-mobile">PROFILE</div>
                                    @if (session('userInfo')['avatar'])
                                        <img class="nav-user-img" src="{{ asset(session('userInfo')['avatar']) }}"
                                            alt="">
                                    @elseif($infouser && $infouser->avatar != null)
                                        <img class="nav-user-img" src="{{ asset($infouser->avatar) }}" alt="ảnh">
                                    @else
                                        <img class="nav-user-img" src="{{ asset('img/convitne.jpg') }}" alt="">
                                    @endif
                                @else
                                    <div class="btn-mobile solid popup-login-responsive">LOGIN</div>
                                @endif
                            </div>
                        </div>
                        <div class="nav-btn">
                            <div class="nav-links">
                                <ul class="ul-mobile">
                                    <li class="nav-link" style="--i: .6s">
                                        <a href="{{ route('/') }}" class="nav-menu-title">HOME</a>
                                    </li>
                                    <li class="nav-link" style="--i: .85s">
                                        <a class="nav-menu-title">ABOUT <i class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                            <ul class="dropdown-mobile-ul">
                                                <li class="dropdown-link">
                                                    <a href="{{ route('aboutus.index') }}">About Us </a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('aboutus.aboutus_whoweare') }}">Our Team</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('contact.index') }}">Location</a>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-link" style="--i: 1.1s">
                                        <a class="nav-menu-title">EXPLORE <i class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                            <ul class="dropdown-mobile-ul">
                                                <li class="dropdown-link">
                                                    <a href="{{ route('project.index', 1) }}">Our Projects</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('detail.listdonate') }}">Donate List</a>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-link" style="--i: 1.35s">
                                        <a class="nav-menu-title">SUPPORT <i class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                            <ul class="dropdown-mobile-ul">
                                                <li class="dropdown-link">
                                                    <a href="{{ route('detail.donate') }}">Donate</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('feedback.create') }}">Feedback</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('volunteer.create') }}">Volunteer</a>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-link" style="--i: 1.6s">
                                        <a class="nav-menu-title">RESOURCES <i class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                            <ul class="dropdown-mobile-ul">
                                                <li class="dropdown-link">
                                                    <a href="{{ route('blog.index') }}">News</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('video.index') }}">Video Gallery</a>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-link" style="--i: 1.85s">
                                        <a href="#" class="nav-menu-title">CONTACT <i
                                                class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                            <ul class="dropdown-mobile-ul">
                                                <li class="dropdown-link">
                                                    <a href="{{ route('contact.index') }}">Contact</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('feedback.create') }}">Feedback</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="{{ route('volunteer.create') }}">Volunteer</a>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-link" style="--i: 2.1s">
                                        <a href="#" class="nav-menu-title">OUR PROJECT<i
                                                class="fa-solid fa-caret-down"></i></a>
                                        <div class="dropdown">
                                           
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="log-sign-dropdown" style="--i: 1.8s">
                                @if (session('userInfo'))
                                    <a href="{{ route('auth.profile') }}" class="btn-mobile solid"
                                        style="text-decoration: none">PROFILE</a>
                                    @if (session('userInfo')['avatar'])
                                        <img class="nav-user-img" src="{{ asset(session('userInfo')['avatar']) }}"
                                            alt="">
                                    @elseif($infouser && $infouser->avatar != null)
                                        <img class="nav-user-img" src="{{ asset($infouser->avatar) }}"
                                            alt="ảnh">
                                    @else
                                        <img class="nav-user-img" src="{{ asset('img/convitne.jpg') }}"
                                            alt="">
                                    @endif
                                @else
                                    <a href="#" class="btn-mobile solid popup-login-responsive-mobile"
                                        style="text-decoration: none;">LOGIN</a>
                                @endif
                            </div>
                        </div>

                        <div class="hamburger-menu-container">
                            <div class="hamburger-menu">
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <!-- desktop interface -->
                    <div style="position: relative;">
                        <ul class="nav_bar">
                            <li><a href="{{ route('/') }}">
                                    <div class="text">
                                        <img class="logo" src="{{ asset('img/logo.PNG') }}" alt=""
                                            style="margin-left: 0;">
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

                            <li>

                                @if (session('userInfo'))
                                    <div class="text popup-profile">
                                        @if (session('userInfo')['avatar'])
                                            <img class="nav-user-img"
                                                src="{{ asset(session('userInfo')['avatar']) }}" alt="">
                                        @elseif($infouser && $infouser->avatar != null)
                                            <img class="nav-user-img" src="{{ asset($infouser->avatar) }}"
                                                alt="ảnh">
                                        @else
                                            <img class="nav-user-img" src="{{ asset('img/humanicon.png') }}"
                                                alt="">
                                        @endif
                                    </div>
                                @else
                                    <div class="text popup-login">LOGIN</div>
                                @endif
                            </li>
                    </div>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    <div>@yield('main')</div>

    {{-- footer --}}

    <div class="container-fluid" style="background: #123b6a; margin-top: 30px;">
        <div class="container">
            <div class="row" style="padding: 50px 0; color: white;">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>OUR STORY</h2>
                        <span>StayHopeful Charity Fund was established under Decision No. 24/QD-BNV dated January 5,
                            2018. StayHopeful is a nationwide scope of operations belongs to Ho Chi Minh City Charity
                            Fund. </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>EXPLORE</h2>
                        <ul>
                            <li><a href="{{ route('aboutus.index', 1) }}">About Us</a></li>
                            <li><a href="{{ route('blog.index') }}">News</a></li>
                            <li><a href="{{ route('detail.listdonate') }}">Donate List</a></li>
                            <li><a href="{{ route('video.index') }}">Video Gallery</a></li>
                            <li><a></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>SUPPORT</h2>
                        <ul>
                            <li><a href="{{ route('project.index', 1) }}">Projects</a></li>
                            <li><a href="{{ route('detail.donate') }}">Donate</a></li>
                            <li><a href="{{ route('feedback.create') }}">Feedback</a></li>
                            <li><a href="{{ route('volunteer.create') }}">Volunteer</a></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>STAYHOPEFUL</h2>
                        <ul>
                            <li><i class="fa-solid fa-map"></i>No. 22 Ben Nghe Street, Ward 2, District 1, Viet Nam
                            </li>
                            <li><i class="fa-solid fa-phone"></i> Hotline : (84-028) 39107612</li>
                            <li><i class="fa-solid fa-envelope"></i><a href="{{ route('contact.index') }}">Email:
                                    contact@StayHopeful.org</a></li>
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
                        <h6>© 2018 STAYHOPEFUL CHARITY FUND. All rights reserved.</h6>
                        <div class="media-icon">
                            <a href="https://www.facebook.com/TuThienGroup/?locale=vi_VN"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.youtube.com/watch?v=H1s_Z8hsdmo&t=138s"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://twitter.com/thien_oanh?lang=en"><i class="fab fa-twitter"></i></a>
                            <a
                                href="https://www.instagram.com/explore/locations/2371602169547650/co-so-tu-thien-xa-hoi-thien-duyen/"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- back to top button beginning --}}
    <button onclick="topFunction()" id="myBackToTopBtn" title="Back to top"><i class="fas fa-angle-up"></i></button>
    {{-- back to top button ending --}}

</body>
<script src="{{ asset('comment/comment.js') }}"></script>
<script src="{{ asset('js/header-nav.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            // console.log($value);
            if ($value) {
                $('#search-ajax').show();
            } else {
                $('#search-ajax').hide();

            }
            $.ajax({
                type: "GET",
                url: "/admin/searchhome",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search-ajax').html(data);
                },
                error: function(data) {
                    console.error(data);
                }
            })
        })
    })
</script>

<script>

    // like-user
    $(document).ready(function() {
        $('.like_post').each(function() {
            var postId = $(this).data('post-id');
            var likeButton = $('.like_post[data-post-id="' + postId + '"]');
            var countElement = $('.count_like[data-post-id="' + postId + '"]');
            var like_icons = $('.like_icon[data-post-id="' + postId + '"]');
            var iconContainer = $('.icon_container[data-post-id="' + postId + '"]');

            $(document).on('click', '.like_post[data-post-id="' + postId + '"]', function(e) {
                e.preventDefault();
                var post_id = $(this).data('post-id');
                var _csrf = '{{ csrf_token() }}';
                var _loginUrl = '{{ route('post.like') }}';

                $.ajax({
                    url: _loginUrl,
                    type: 'POST',
                    data: {
                        post_id: post_id,
                        _token: _csrf
                    },
                    success: function(data) {
                        if (data.like_user === 1) {
                            // like_icons.addClass('show');
                            likeButton.addClass('active');
                        } else {
                            // like_icons.addClass('show');
                            like_icons.addClass('dislike_icon_color');
                            likeButton.removeClass('active');
                        }
                        if (data.count == 0) {
                            countElement.text('');
                        } else {
                            countElement.text(data.count);
                        }
                    }
                });
            });
        });
    });

    // back to top button beginning
    // Get the button
    let mybutton = document.getElementById("myBackToTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    // back to top button ending
</script>

</html>
