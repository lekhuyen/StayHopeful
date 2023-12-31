@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Reply Mail')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('admin.viewmail') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>


    @if (session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <h1>Reply Mail</h1>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.sendreplymail', $mail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="{{ $mail->name }}" disabled>
                        <input type="hidden" name="name" value="{{ $mail->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" value="{{ $mail->email }}" disabled>
                        <input type="hidden" name="email" value="{{ $mail->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Title:</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter title" id="subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Content:</label>
                        <textarea type="text" class="form-control" id="message" placeholder="Enter content" name="message"></textarea>
                    </div>
                    <img src="" id="imagePreview" style="visibility: hidden" name="image">
                    <input type="hidden" name="isImagePresent" id="isImagePresent" value="0">

                    <div class="d-flex justify-content-center btn__center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#message'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
