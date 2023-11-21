@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/managerdesign.css') }}">

    <div class="container">
        <h1 style="font-weight: 700">Quản Lý Giao Diện</h1>
        <div class="row d-flex justify-content-between mt-5 position-relative">
            <div class="col-lg-6">
                <div class="search">
                    <div class="search-container">
                        <i class="fas fa-magnifying-glass search-icon"></i>
                        <input type="search" placeholder="Tìm Kiếm Tên Danh Mục" class="form-control input-search">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="btnsearch position-absolute " style="right: 0;">
                    <button class="btn-search " data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                        class="fa-solid fa-plus"></i><span>Thêm Tài Khoản</span></button>
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
                                <td>Tác Vụ</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Trang Chủ</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="100" class="img-hover-scale"></td>
                                <td>
                                    <a href="#"><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fa-regular fa-pen-to-square" style="color: #ffffff"></i>
                                        </button></a>
                                    <a href="#"><button class="btn btn-danger"><i class="fa-solid fa-x"
                                                style="color: #ffffff;"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Trang Chủ</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="100" class="img-hover-scale"></td>
                                <td>
                                    <a href="#"><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fa-regular fa-pen-to-square" style="color: #ffffff"></i>
                                        </button></a>
                                    <a href="#"><button class="btn btn-danger"><i class="fa-solid fa-x"
                                                style="color: #ffffff;"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Trang Chủ</td>
                                <td><img src="{{ asset('img/omg.jpeg') }}" width="100" class="img-hover-scale"></td>
                                <td>
                                    <a href="#"><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fa-regular fa-pen-to-square" style="color: #ffffff"></i>
                                        </button></a>
                                    <a href="#"><button class="btn btn-danger"><i class="fa-solid fa-x"
                                                style="color: #ffffff;"></i></button></a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <select class="form-select" aria-label="Default select example" name="catogries-change">
                                <option selected>Chọn Danh Mục</option>
                                <option value="Trang chủ">Trang Chủ</option>
                                <option value="Blog">Blog</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image-change" class="form-label">Ảnh Cũ:</label>
                            <img src="{{ asset('img/omg.jpeg') }}" width="100">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image-change" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image-change" placeholder="Chọn Ảnh Mới"
                                name="image-change" onchange="previewImage()">
                        </div>
                        <div class="mb-3 mt-3">
                            <img id="image-preview" src="" width="100">
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
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <select class="form-select" aria-label="Default select example" name="catogries-add">
                                <option selected>Chọn Danh Mục</option>
                                <option value="Trang chủ">Trang Chủ</option>
                                <option value="Blog">Blog</option>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="image-add" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image-add" placeholder="Chọn Ảnh Mới"
                                name="image-add" onchange="previewImage()">
                        </div>
                        <div class="mb-3 mt-3">
                            <img id="image-preview" src="" width="100">
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
    {{-- them moi modal --}}
    <script>
        function previewImage() {
            var input = document.getElementById('image-change');
            var preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
            }
        }
    </script>
@endsection
