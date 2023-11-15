@extends('frontend.adminpage.adminindex')
@section('admin_content')
<link rel="stylesheet" href="{{asset('detaildonate(css)/managermember.css')}}">
<div class="container">
    <h1 style="font-weight: 700">Quản lý Bài Đăng</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="textusers">
                <p>All Users (220)</p>
                <p><input type="search" placeholder="Find User By name"><button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-table ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Tên người dùng</td>
                            <td>Nội Dung</td>
                            <td>Ngày Đăng</td>
                            <td>Tác Vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng Bài Tìm Con Ve Sầu</td>
                            <td>20-5-2026</td>
                            <td><a href="#"><i class="fa-solid fa-check" style="color: #4CAF50"></i></a>
                                <a href="#"><span class="icon"><i class="fa-solid fa-x" style="color: #D32F2F;"></i></span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
