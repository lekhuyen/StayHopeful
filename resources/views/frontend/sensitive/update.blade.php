@extends('frontend.adminpage.index')
@section('admin_content')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('sensitive.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    <div class="container mt-3">
        <h1>Update Sensitive Word</h1>
        <form action="{{ route('sensitive.update', $sensitive) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="sensitive">Sensitive Word:</label>
                <input type="text" class="form-control" id="sensitive" value="{{ $sensitive->word }}"
                    placeholder="Enter Sensitive Word" name="word">
                @error('word')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
