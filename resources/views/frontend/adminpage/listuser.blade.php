@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/listuser.css') }}">
    <div class="container">
        <h1 style="font-weight: 700">Manager User</h1>
        <div class="row d-flex justify-content-between mt-5 position-relative">
            <div class="col-lg-6">
                <div class="search">
                    <div class="search-container">
                        <i class="fas fa-magnifying-glass search-icon"></i>
                        <input type="search" placeholder="Search User Name" class="form-control input-search">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="btnsearch position-absolute " style="right: 0;">
                    <button class="btn-search " data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                            class="fa-solid fa-plus"></i><span>Add New Account</span></button>
                </div>
            </div>
        </div>
        <div class="row row-rs">
            <div class="col-lg-12 mt-5">
                <div class="form-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Day_create</th>
                                <th>Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" class="image-hover" width="50px" height="50px"
                                        style="border-radius: 50%; margin-right: 20px"> Phong</td>
                                <td>phong@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đang hoạt động</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="50px" height="50px"
                                        style="border-radius: 50%; margin-right: 20px"> Khuyên</td>
                                <td>khuyen@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đang hoạt động</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="50px" height="50px"
                                        style="border-radius: 50%; margin-right: 20px"> Yeong</td>
                                <td>Yeong@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đang hoạt động</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="50px" height="50px"
                                        style="border-radius: 50%; margin-right: 20px"> Sương</td>
                                <td>Sương@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đang hoạt động</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- popup --}}
    <!-- Modal thay doi thong tin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Thông Tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email"
                                name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="date-register" class="form-label">Ngày Đăng Ký:</label>
                            <input type="date" class="form-control" id="date" placeholder="Choose Date"
                                name="date">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Số Điện Thoại:</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number"
                                name="phone">
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                    name="status-change">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Thay Đổi Trạng Thái</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email"
                                name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password"
                                name="password">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number"
                                name="phone">
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                    name="status-add">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Change Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
