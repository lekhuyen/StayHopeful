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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
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
<link rel="stylesheet" href="{{ asset('admincss/sidebar.css') }}">
{{-- siderbar --}}
<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4"><a href="{{ route('/') }}"><img src="{{ asset('img/logo.PNG') }}" width="100%"
                        height="100%"></a></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                    class="fa-solid fa-bars-staggered"></i></button>
        </div>

        <ul class="ul__sidebar list-unstyled px-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa fa-home"></i> Dashboard</a></li>
            <li class="text-decoration-none px-3 py-2 d-block">
                <div class="sider-dropdown">Manager<i class="fa-solid fa-angle-right" style="margin-left: 30px"></i>
                    <div class="sider-dropdown-menu">
                        <a href="{{ route('admin.managerpost') }}" class="siderbar-item"><i
                                class="fa-solid fa-image"></i>Post</a>
                        @can('slider_list')
                            <a href="{{ route('admin.managerdesign') }}" class="siderbar-item"><i
                                class="fa-solid fa-desktop"></i>Slider</a>
                        @endcan

                        <a href="{{ route('admin.listuser') }}" class="siderbar-item"><i
                                class="fa-solid fa-users"></i>User List</a>
                        <a href="{{ route('post.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-users"></i>User Posts</a>
                        @can('project_list')
                            <a href="{{ route('projectAd.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Project List</a>
                        @endcan

                        @can('category_list')
                            <a href="{{ route('category.index') }}" class="siderbar-item"><i
                                    class="fa-solid fa-briefcase"></i>Category List</a>
                        @endcan

                        @can('news_list')
                            <a href="{{ route('news.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>News List</a>
                        @endcan
                        
                        @can('video_list')
                            <a href="{{ route('video-list.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Video Gallery</a>
                        @endcan

                        <a href="{{ route('feedback.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Feedback List</a>
                        {{-- @can('user_list') --}}
                            <a href="{{ route('staff.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Staff List</a>
                        {{-- @endcan --}}

                        {{-- @can('roles_list') --}}
                            <a href="{{ route('roles.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Roles List</a>
                        {{-- @endcan --}}

                        {{-- <a href="{{ route('volunteer.index') }}" class="siderbar-item"><i
                                class="fa-solid fa-briefcase"></i>Volunteer List</a> --}}
                    </div>
                </div>
            </li>

            <li><a href="{{ route('admin.listdonate') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-briefcase"></i>
                    Donate List</a></li>
            {{-- @can('permissions_add') --}}
                <li><a href="{{ route('permissions.create') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-briefcase"></i>
                    Add Permissions</a></li>
            {{-- @endcan --}}

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
                            <div class="dropdown-profile" id="dropdown-profile">
                                <button style="border: none; background: transparent" id="dropdown-profile-image"><img
                                        src="{{ asset('img/omg.jpeg') }}" width="50px" height="50px"
                                        style="border-radius: 50%"></button>
                                <div class="dropdownmenu-profile">
                                    <a href="https://www.youtube.com/watch?v=tc5SiDjDPAM&ab_channel=Bo%27ohw%27o%27wo%27er"
                                        class="dropdownitem-profile">Profile</a>
                                    <a href="https://www.youtube.com/watch?v=tc5SiDjDPAM&ab_channel=Bo%27ohw%27o%27wo%27er"
                                        class="dropdownitem-profile">Logout</a>
                                </div>
                            </div>
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
<footer class="footer">
    <div class="text-footer">Stay Hope Ful</div>
</footer>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script>
    var profilebtn = document.getElementById('dropdown-profile');
    var dropdownMenu = document.querySelector('.dropdownmenu-profile');

    profilebtn.addEventListener('click', function() {
        profilebtn.classList.add('dropdown-profile-click');
        dropdownMenu.classList.toggle('active-profile-dropdown');
    })
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownsider = document.querySelector('.sider-dropdown');
        var angleIcon = dropdownsider.querySelector('.fa-angle-right');
        var siderMenu = dropdownsider.querySelector('.sider-dropdown-menu');

        dropdownsider.addEventListener('click', function() {
            angleIcon.classList.toggle('fa-angle-right');
            angleIcon.classList.toggle('fa-angle-down');
            siderMenu.classList.toggle('show-menu');
        });
    });
</script>
