<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            <li class="active"><a href="{{route('admin.dashboard')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa fa-home"></i> Dashboard</a></li>
            <li class=""><a href="{{route('admin.managermember')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-user"></i>
                        Manager Member</a></li>

        </ul>
        <hr class="h-color mx-2">

        

    </div>
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i></button>
                    <a class="navbar-brand fs-4" href="#"><span
                            class="bg-dark rounded px-2 py-0 text-white">CL</span></a>

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
<script src="{{ asset('js/sidebar.js') }}"></script>
