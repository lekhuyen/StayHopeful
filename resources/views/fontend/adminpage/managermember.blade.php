@extends('fontend.adminpage.adminindex')
@section('admin_content')
<link rel="stylesheet" href="{{asset('detaildonate(css)/managermember.css')}}">
<div class="container">
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
            <div class="form-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Content</td>
                            <td>Date_up</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phong</td>
                            <td>Đăng bài viết về con ve sầu</td>
                            <td>14/11/2023</td>
                            <td><a href="#"><i class="fa-solid fa-x" style="color: #f50000; margin-right: 20px"></i></a>
                            <a href="#"><i class="fa-solid fa-check" style="color: #76FF03"></i></a></td>
                        </tr>
                    </tbody>
            </div>
            </table>
        </div>
    </div>
</div>
@endsection