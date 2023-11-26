@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('admincss/managerdesign.css') }}">


    <div class="container">
        <h1 style="font-weight: 700">Manager Design</h1>
        <div class="row d-flex justify-content-between mt-5 position-relative">
            <div class="col-lg-6">
                <div class="search">
                    <div class="search-container">
                        <i class="fas fa-magnifying-glass search-icon"></i>
                        <input type="search" placeholder="Search Category Name" class="form-control input-search">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="btnsearch position-absolute " style="right: 0;">
                    <button class="btn-search " data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                            class="fa-solid fa-plus"></i><span>Add New Image</span></button>
                </div>
            </div>
        </div>
        <div class="row row-rs">
            <div class="col-lg-12 mt-5">
                <div class="form-table ">
                    <table class="table table-striper">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Catogries</td>
                                <td>Image</td>
                                <td>Name Image</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->categories_sliders->name }}</td>
                                    <td><img src="{{ asset($slider->url_image) }}" width="100"
                                            onclick="openImagePopup('{{ asset($slider->url_image) }}')"></td>
                                    <td>{{ $slider->slider_name }}</td>
                                    <td style="display: flex; align-items: center; height: 150px;">
                                        <a href="#" data-slider-id="{{ $slider->id }}" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <button type="button" class="btn btn-success" style="margin-right: 10px;">
                                                <i class="fa-regular fa-pen-to-square" style="color: #ffffff; "></i>
                                            </button>
                                        </a>

                                        <form method="POST"
                                            action="{{ route('admin.delete_slider', ['slider' => $slider->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-x" style="color: #ffffff;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($sliders as $slider)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.update_slider', ['slider' => $slider->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3 mt-3">
                                <select class="form-select" aria-label="Default select example" id="categories" name="categories">
                                    <option selected>Choose Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="current-image" class="form-label">Current Image:</label>
                                <img id="current-image" src="" width="100">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="image-change" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="image-change" placeholder="Choose New Image"
                                    name="image" onchange="previewImage()">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="image-preview">New Image Preview:</label>
                                <img id="image-preview" src="" width="100">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name-image-change" class="form-label">Name Image:</label>
                                <input type="text" class="form-control" id="name-image-change"
                                    placeholder="Enter New Image Name" name="nameimage">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.create_slider') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <select class="form-select" aria-label="Default select example" name="categories">
                                <option selected>Choose Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image" placeholder="Choose New Image"
                                name="image" onchange="previewImage2()">
                        </div>
                        <div class="mb-3 mt-3">
                            <img id="image-preview2" src="" width="100">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name-image" class="form-label">Name Image:</label>
                            <input type="text" class="form-control" id="name-image" placeholder="Enter Name Picture"
                                name="nameimg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- them moi modal --}}
    <div class="modal" id="imageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('slider-id');
            $.ajax({
                type: 'GET',
                url: '/admin/managerdesign/' + id,
                success: function(response) {
                    console.log(response);
                    $('#current-image').attr('src', response.url);
                    $('#categories').val(response.categories).prop("selected", true);
                    $('#name-image-change').val(response.slider_name);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });

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

        function previewImage2() {
            var input = document.getElementById('image');
            var preview = document.getElementById('image-preview2');

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


        function openImagePopup(imageSrc) {
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;

            $('#imageModal').modal('show');
        }
    </script>
@endsection