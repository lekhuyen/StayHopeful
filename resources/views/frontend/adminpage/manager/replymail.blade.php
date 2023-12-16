@extends('frontend.adminpage.index')
@section('admin_content')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    @if (session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
    <div class="container">
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
                        <label for="subject" class="form-label">Subject:</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject"
                            id="subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message:</label>
                        <textarea type="text" class="form-control" id="message" placeholder="Enter message" name="message"></textarea>
                    </div>
                    <img src="" id="imagePreview" style="visibility: hidden" name="image">
                    <input type="hidden" name="isImagePresent" id="isImagePresent" value="0">

                    <button type="submit" class="btn btn-primary">Submit</button>
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
