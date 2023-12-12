@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/managerdesign.css') }}">


    <div class="container">
        <div class="row d-flex justify-content-between mt-5 position-relative" style="margin-bottom: 20px">
            <div class="col-lg-6">
                <div class="search">
                    <div class="search-container">
                        <i class="fas fa-magnifying-glass search-icon"></i>
                        <input type="search" placeholder="Search Category Name" id="search"
                            class="form-control input-search" name="search">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="btnsearch position-absolute " style="right: 0;">
                    @can('slider_add')
                        <button class="btn-search " data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                class="fa-solid fa-plus"></i><span>Add New Image</span></button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row row-rs">
            <h1>Slider Design</h1>
            <div class="col-lg-12 mt-5">
                <div class="form-table ">
                    <table class="table table-striper">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Action</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody class="data_all">
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td><img src="{{ asset($slider->url_image) }}" width="100"
                                            onclick="openImagePopup('{{ asset($slider->url_image) }}')"></td>
                                    <td>{{ $slider->slider_name }}</td>
                                    <td>
                                        @can('slider_edit')
                                            <a href="#" data-slider-id="{{ $slider->id }}" class="edit-slider"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <button type="button" class="btn btn-warning" style="margin-right: 10px;">
                                                    <i class="fa-solid fa-pen-to-square""></i>
                                                </button>
                                            </a>
                                        @endcan

                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.delete_slider', ['slider' => $slider->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            @can('slider_delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody id="content" class="searchdata"></tbody>
                    </table>
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
    @foreach ($sliders as $slider)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.update_slider', ['slider' => $slider->id]) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $slider->id }}">

                        <div class="modal-body">

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
                    <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.create_slider') }}">
                    @csrf
                    <div class="modal-body">

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
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value) {
                    $('.data_all').hide();
                    $('.searchdata').show();
                } else {
                    $('.data_all').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type: "GET",
                    url: "/admin/searchdesign",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#content').html(data);
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.edit-slider').on('click', function(event) {
                var id = $(this).data('slider-id');
                var form = $('#exampleModal form');
                var action = form.attr('action');
                form.attr('action', action.replace(/\/\d+$/, '/' + id));

                $.ajax({
                    type: 'GET',
                    url: '/admin/managerdesign/' + id,
                    success: function(response) {
                        console.log(response);
                        $('#current-image').attr('src', response.url);
                        $('#name-image-change').val(response.slider_name);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });
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
