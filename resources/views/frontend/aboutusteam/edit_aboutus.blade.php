@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Edit Member Information')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="btn__back">
    <a href="{{ route('aboutusteam.index') }}" class="btn__go_back">
        <i class="fa fa-long-arrow-left"></i>GO BACK
    </a>
</div>

<div class="container mt-3">
    <h1>Edit Member Information</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusteam.update', $aboutusteam) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                value="{{ $aboutusteam->name }}">
        </div>

        <div class="form-group mb-3">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age"
                value="{{ $aboutusteam->age }}">
        </div>

        <div class="form-group mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                value="{{ $aboutusteam->email }}">
        </div>

        <div class="form-group mb-3">
            <label for="skill">Skill:</label>
            <select class="form-control" id="skill" name="skill">
                <option value="Marketing Team" @if ($aboutusteam->skill == 'Marketing Team') selected @endif>Marketing Team</option>
                <option value="Financial Team" @if ($aboutusteam->skill == 'Financial Team') selected @endif>Financial Team</option>
                <option value="Lead Developer Team" @if ($aboutusteam->skill == 'Lead Developer Team') selected @endif>Lead Developer
                    Team</option>
                <option value="Creative Team" @if ($aboutusteam->skill == 'Creative Team') selected @endif>Creative Team</option>
                <option value="Volunteer" @if ($aboutusteam->skill == 'Volunteer Team') selected @endif>Volunteer</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" id="description" placeholder="Enter description" name="description">{{ $aboutusteam->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="images">Current Images:</label>
            @if ($aboutusteam->images->count() > 0)
                @foreach ($aboutusteam->images as $item)
                    <img src="{{ asset($item->url_image) }}" class="img-thumbnail" width="100"
                        alt="{{ $aboutusteam->name }}" />
                @endforeach
            @else
                <p>No image available</p>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="new_images">New Images:</label>
            <input type="file" class="form-control" id="new_images" multiple name="images[]" />
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="status" value="1"
                    @if ($aboutusteam->status == '1') checked @endif>
                <label class="form-check-label" for="radio1">Active</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="status" value="0"
                    @if ($aboutusteam->status == '0') checked @endif>
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
