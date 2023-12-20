@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Update Event for Volunteer')

{{-- css --}}
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

<div class="btn__back">
    <a href="{{ route('projectAd.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
</div>

<div class="container mt-3">
    <h1>Update Event for Volunteer Project</h1>
    <h5 class="text-info">Project Name: {{  $project->title}}</h5>
    <form action="{{ route('projectAd.update_event', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date"
            value="{{old('start_date', $project->start_date) }}">
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date', $project->end_date) }}">
            @error('end_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity"
                value="{{ old('quantity', $project->quantity) }}">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="active" name="status_event" value="1"
                {{ old('status_event', $project->status_event =='1' ? 'checked' : '') }} checked>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="active" name="status_event" value="0"
                {{ old('status_event', $project->status_event  =='0'? 'checked' : '') }}>
            <label class="form-check-label" for="active">Deactive</label>
        </div>
        <div class="d-flex justify-content-center btn__center">
            <button type="submit" class="btn btn-primary submit-project">Submit</button>
        </div>
    </form>
</div>
@endsection
