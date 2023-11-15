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
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Lora:wght@600&family=Raleway:wght@300&display=swap" rel="stylesheet">
{{-- font --}}
<link rel="stylesheet" href="{{ asset('detaildonate(css)/sidebar.css') }}">
{{-- siderbar --}}
<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">Admin</span><span class="text-white">StayHopeFul</span></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                    class="fa-solid fa-bars-staggered"></i></button>
        </div>

        <ul class="list-unstyled px-2">
            <li ><a href="{{route('admin.dashboard')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa fa-home"></i> Dashboard</a></li>
            <li ><a href="{{route('admin.managermember')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-user"></i>
                        Quản Lý Bài Đăng</a></li>
            <li ><a href="{{route('admin.managerdesign')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-desktop"></i>
                        Quản Lý Giao Diện</a></li>
            <li ><a href="{{route('admin.listuser')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-desktop"></i>
                        Quản Lý Người dùng</a></li>

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
                            <a class="nav-link active" aria-current="page" href="#">Welcome Admin Báo <img src="{{asset('img/tramanh1.jpg')}}" width="50px" height="50px" style="border-radius: 50%"></a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="dashboard-content px-3 pt-4">
            {{-- content --}}
            @yield('admin_content')
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container row">
        <div class="footer-col">
            <h4>company</h4>
            <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">our services</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">visit website</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>get help</h4>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">returns</a></li>
                <li><a href="#">order status</a></li>
                <li><a href="#">payment options</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>online shop</h4>
            <ul>
                <li><a href="#">download</a></li>
                <li><a href="#">changelog</a></li>
                <li><a href="#">github</a></li>
                <li><a href="#">all version</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>follow us</h4>
            <div class="social-links">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/sidebar.js') }}"></script>