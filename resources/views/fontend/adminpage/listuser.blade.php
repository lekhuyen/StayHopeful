@extends('fontend.adminpage.adminindex')
@section('admin_content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI/tTme6a0WZhGJxCX2vZlVu6/ZFEcYS+MHMQcG4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('detaildonate(css)/listuser.css') }}">
    <div class="container">
        <h1 style="font-weight: 700">Quản Lý Người Dùng</h1>
        <div class="row d-flex justify-content-between mt-5 position-relative">
            <div class="col-lg-6">
                <div class="search">
                    <input type="search" placeholder="Tìm Kiếm Tên Người Dùng" class="form-control input-search">
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="btnsearch position-absolute " style="right: 0;">
                    <button class="btn-search "><i class="fa-solid fa-plus"></i><span>Thêm Tài Khoản</span></button>
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
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Đăng Ký</th>
                                <th>Trạng Thái</th>
                                <th style="text-align: center">Chỉnh Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Phong</td>
                                <td>phong@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đang hoạt động</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Khuyên</td>
                                <td>phong@gmail.com</td>
                                <td>099999999</td>
                                <td>19-10-2019</td>
                                <td>Đã bị khoá</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary">
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
    <!-- Modal -->
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
                            <input type="text" class="form-control" id="email" placeholder="Nhập Tên" name="name">
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Nhập Email" name="email">
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="number" class="form-control" id="email" placeholder="Nhập Số Điện Thoại" name="phone">
                          </div>
                          <div class="mb-3 mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Thẩy Đổi Trạng Thái</label>
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

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
@endsection
