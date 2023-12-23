@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Add New Member')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <div class="btn__back">
        <a href="{{ route('aboutusteam.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>

    <div class="container mt-3">

        <h1>Add New Member</h1>
        <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusteam.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" placeholder="Enter age" name="age"
                    value="{{ old('age') }}">
                @error('age')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="skill" class="form-label">Skill:</label>
                <select class="form-control" id="skill" name="skill">
                    <option value="Marketing Team" @selected(old('skill') == 'Marketing Team')>Marketing Team</option>
                    <option value="Financial Team" @selected(old('skill') == 'Financial Team')>Financial Team</option>
                    <option value="Lead Developer Team" @selected(old('skill') == 'Lead Developer Team')>Lead Developer Team</option>
                    <option value="Creative Team" @selected(old('skill') == 'Creative Team')>Creative Team</option>
                    <option value="Volunteer" @selected(old('skill') == 'Volunteer')>Volunteer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea type="text" class="form-control" id="description" placeholder="Enter description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Image:</label>
                <input type="file" class="form-control" id="images" multiple name="images[]" />
            @error('images')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="status" value="1" checked
                        @checked(old('status') == '1')>
                    <label class="form-check-label" for="radio1">Active</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="status" value="0"
                        @checked(old('status') == '0')>
                    <label class="form-check-label" for="radio2">Deactive</label>
                </div>
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @include('frontend/login/login')
@endsection
