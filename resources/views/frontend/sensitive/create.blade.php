@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('feedbackcss/create__sensitive.css') }}">
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('sensitive.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <strong class="text-success">{{ session('success') }}</strong>
        </div>
    @endif
    <form action="{{ route('sensitive.store') }}" method="post">
        @csrf
        <div class="sensitive__container">
            <h1>New Sensitive Word</h1>
            <div class="mb-3 mt-3">
                <label for="word">Word:</label>
                <input type="text" class="form-control" id="word" value="{{ old('word') }}"
                    placeholder="Enter a sensitive word" name="word">
                @error('word')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check radio__sensitive">
                    <input type="radio" class="form-check-input" id="radio1"
                        {{ old('status') == '1' ? 'checked' : '' }} name="status" value="1" checked>
                    <label class="form-check-label" for="radio1">Active</label>
                </div>
                <div class="form-check radio__sensitive">
                    <input type="radio" class="form-check-input" {{ old('status') == '0' ? 'checked' : '' }}
                        id="radio2" name="status" value="0">
                    <label class="form-check-label" for="radio2">Deactive</label>
                </div>
            </div>

            <div class="btn__sensitive">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    </div>
@endsection
