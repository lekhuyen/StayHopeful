@extends('frontend.adminpage.index')
@section('admin_content')
<link rel="stylesheet" href="{{asset('detaildonate(css)/managerdesign.css')}}">

<div class="container">
    <h1 style="font-weight: 700">Quản Lý Giao Diện</h1>
    <div class="row d-flex justify-content-between mt-5 position-relative">
        <div class="col-lg-6">
            <div class="search">
                <div class="search-container">
                    <i class="fas fa-magnifying-glass search-icon"></i>
                    <input type="search" placeholder="Tìm Kiếm Tên Người Dùng" class="form-control input-search">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="btnsearch position-absolute " style="right: 0;">
                <button class="btn-search"><i class="fa-solid fa-plus"></i><span>Thêm Mới</span></button>
            </div>
        </div>
    </div>
    <div class="row row-rs">
        <div class="col-lg-12 mt-5">
            <div class="form-table ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Danh Mục</td>
                            <td>Hình Ảnh</td>
                            <td>Tên Ảnh</td>
                            <td>Tác Vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Slider Trang chủ</td>
                            <td><img src="{{asset('img/tramanh1.jpg')}}" width="30px"></td>
                            <td>Chị Trâm Anh</td>
                            <td><a href="#"><i class="fa-regular fa-pen-to-square" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Slider Trang chủ</td>
                            <td><img src="{{asset('img/tramanh1.jpg')}}" width="30px"></td>
                            <td>Chị Trâm Anh</td>
                            <td><a href="#"><i class="fa-regular fa-pen-to-square" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Slider Trang chủ</td>
                            <td><img src="{{asset('img/tramanh1.jpg')}}" width="30px"></td>
                            <td>Chị Trâm Anh</td>
                            <td><a href="#"><i class="fa-regular fa-pen-to-square" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Slider Trang chủ</td>
                            <td><img src="{{asset('img/tramanh1.jpg')}}" width="30px"></td>
                            <td>Chị Trâm Anh</td>
                            <td><a href="#"><i class="fa-regular fa-pen-to-square" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Slider Trang chủ</td>
                            <td><img src="{{asset('img/tramanh1.jpg')}}" width="30px"></td>
                            <td>Chị Trâm Anh</td>
                            <td><a href="#"><i class="fa-regular fa-pen-to-square" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection