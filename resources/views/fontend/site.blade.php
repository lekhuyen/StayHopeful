<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('home/Home_style.css')}}">
    <link rel="stylesheet" href="{{asset('detailPost/detailpost.css')}}">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js')}}" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js')}}" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid" style="padding-left: 0;" >
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav_bar">
                    <li><a href="">
                        <div class="text">
                                <img class="logo" src="./img/Logo.jpg" alt="" style="margin-left: 0;"> 
                                HOME
                            </div>
                        </a></li>
                    <li><a href="">
                            <div class="text">GIỚI THIỆU</div>
                        </a></li>
                    <li><a href="">
                            <div class="text">CHƯƠNG TRÌNH</div>
                        </a></li>
                    <li><a href="">
                            <div class="text">ĐÓNG GÓP</div>
                        </a></li>
                    <li><a href="">
                            <div class="text">TIN TỨC</div>
                        </a></li>
                    <li><a href="">
                            <div class="text">LIÊN HỆ</div>
                        </a></li>
                    <li><a href="">
                            <div class="text">LOGIN</div>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('main')

{{-- footer --}}
    <div class="container-fluid" style="background-color: #38B6FF; margin-top: 150px;">
        <div class="container">
            <div class="row" style="padding: 50px 0; color: white;">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>VỀ CHÚNG TÔI</h2>
                        <span>Quỹ Từ thiện Stay Hopeful được thành lập theo Quyết định số: 
                            24/QĐ-BNV ngày 5 tháng 1 năm 2018. Quỹ Bông Sen là phiên bản 
                            mở rộng của Quỹ Từ thiện Tình Thương thành phố Hồ Chí Minh. 
                            Quỹ có phạm vi hoạt động toàn quốc.
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>HƯỚNG DẪN – GIỚI THIỆU</h2>
                        <ul>
                            <li><a href="">Hướng dẫn đóng góp</a></li>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Tổ chức</a></li>
                            <li><a href="">Lịch sử</a></li>
                            <li><a href="">Quy chế tác viên</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>CHƯƠNG TRÌNH</h2>
                        <ul>
                            <li><a href="">Trợ giúp y tế</a></li>
                            <li><a href="">Dự án xây dựng</a></li>
                            <li><a href="">Trợ giúp suất ăn giá thấp</a></li>
                            <li><a href="">Cứu trợ khẩn cấp</a></li>
                            <li><a href="">Giáo dục và dạy nghề</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer_header">
                        <h2>QUỸ TỪ THIỆN STAY HOPEFUL</h2>
                        <ul>
                            <li><i class="fa-solid fa-map"></i> Tầng 5, số 7 – 9 – 11 Mai Thị Lựu, P. Đa Kao, Quận 1, TP.Hồ Chí Minh.</li>
                            <li><i class="fa-solid fa-phone"></i> Hotline : (84-028) 39107612 – Ext.227</li>
                            <li><i class="fa-solid fa-fax"></i> Fax : (84-028) 3910 7614</li>
                            <li>Email: contact@quybongsen.org</li>
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
                        <h6>©2017 QUỸ TỪ THIỆN STAY HOPEFUL. All rights reserved. Serviced by Easyweb.vn</h6>
                        <div class="media-icon">
                            <a href=""><i class="fa-brands fa-square-facebook" style="cursor: pointer; background-color: #3B5998; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-youtube" style="cursor: pointer; background-color: #e22b26; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-twitter" style="cursor: pointer; background-color: #0591fc; color: white;"></i></a>
                            <a href=""><i class="fa-brands fa-square-instagram" style="cursor: pointer; background-color: #d67d51; color: white;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>




