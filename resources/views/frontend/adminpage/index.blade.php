{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
{{-- bootstrap --}}
{{-- icon fontawsome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- icon fontawsome --}}

{{-- jquery --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- jquery --}}

{{-- font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Lora:wght@600&family=Raleway:wght@300&display=swap"
    rel="stylesheet">

{{-- ckeditor --}}
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Whisper&display=swap" rel="stylesheet">
{{-- font --}}
{{-- css --}}
<link rel="stylesheet" href="{{ asset('admincss/sidebar.css') }}">
{{-- css --}}
{{-- siderbar --}}
<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4"><a href="{{ route('/') }}"><img src="{{ asset('img/logo.PNG') }}" width="100%"
                        height="100%"></a></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"
                    style="padding-right: 20px"></i></button>
        </div>

        <ul class="ul__sidebar list-unstyled px-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa fa-home" style="padding-right: 6px"></i>Dashboard</a></li>
            @can('permissions_add')
                <li><a href="{{ route('permissions.create') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-clipboard-user" style="padding-right: 10px"></i>Permission</a></li>
            @endcan
            @can('roles_list')
                <li><a href="{{ route('roles.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-clipboard-user" style="padding-right: 10px"></i>Role
                        List</a></li>
            @endcan
            @can('user_list')
                <li><a href="{{ route('staff.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-person" style="padding-right: 10px"></i>Admin
                        List</a></li>
            @endcan

            <li><a href="{{ route('admin.listuser') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-users" style="padding-right: 10px"></i>User List</a></li>
            <li><a href="{{ route('post.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-users" style="padding-right: 10px"></i>User
                    Post</a></li>
            @can('category_list')
                <li><a href="{{ route('category.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-briefcase" style="padding-right: 10px"></i>Category List</a></li>
            @endcan
            @can('project_list')
                <li><a href="{{ route('projectAd.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-brands fa-usps" style="padding-right: 10px"></i>Project
                        List</a></li>
            @endcan
            @can('slider_list')
                <li><a href="{{ route('admin.managerdesign') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-desktop" style="padding-right: 10px"></i>Slider</a></li>
            @endcan

            @can('news_list')
                <li><a href="{{ route('news.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-briefcase" style="padding-right: 10px"></i>News
                        List</a></li>
            @endcan

            @can('video_list')
                <li><a href="{{ route('video-list.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-video" style="padding-right: 10px"></i>Video
                        Gallery</a></li>
            @endcan

            <li><a href="{{ route('admin.listdonate') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-money-bill" style="padding-right: 6px"></i>
                    Donate List</a></li>

            <li><a href="{{ route('feedback.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-message" style="padding-right: 10px"></i>Feedback
                    List</a></li>

            <li><a href="{{ route('volunteer.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-handshake-angle" style="padding-right: 10px"></i>Volunteer
                    List</a></li>

            <li><a href="{{ route('aboutusteam.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-regular fa-address-card" style="padding-right: 10px"></i>About Us</a></li>

            <li><a href="{{ route('admin.viewmail') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-envelope" style="padding-right: 10px"></i>
                    MailBox</a></li>
        </ul>
        <hr class="h-color mx-2">
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i></button>
                    <a class="navbar-brand fs-4" href="#"><span
                            class="bg-dark rounded px-2 py-0 text-white">StayHopeful</span></a>

                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            @if (session('userInfo'))
                                <div class="text popup-profile">
                                    @if (session('userInfo')['avatar'])
                                        <img class="nav-user-img" src="{{ asset(session('userInfo')['avatar']) }}"
                                            alt="">
                                    @elseif(!$infouser->avatar == null)
                                        <img class="nav-user-img" src="{{ asset($infouser->avatar) }}"
                                            alt="ảnh">
                                    @else
                                        <img class="nav-user-img" src="{{ asset('img/convitne.jpg') }}"
                                            alt="">
                                    @endif
                                </div>
                            @else
                                <div class="text popup-login">LOGIN</div>
                            @endif
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>
<div class="dashboard-content px-3 pt-4">
    {{-- content --}}
    @yield('admin_content')

    {{-- ckeditor --}}
    @yield('ckeditor')
</div>

{{-- beginning of footer  --}}
<div class="container-fluid">
    <div class="row">
        <div class="footer__dashboard__content">
            <p class="footer__text">© 2018 STAYHOPEFUL CHARITY FUND. All rights reserved.</p>
        </div>
    </div>
</div>
{{-- ending of footer  --}}

<script src="{{ asset('js/sidebar.js') }}"></script>
@include('frontend/login/login')
@include('frontend/profile/popup_profile')
