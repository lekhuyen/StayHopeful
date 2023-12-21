@extends('frontend.adminpage.index')

@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-QHhxXv+gHGDx4DIjMYG3UzUE8z2WfS10Iz//FTK9kl4pG1oRz6qwn6Klr8IxLhU8P1vnMCqyvlV5HAjRf/umUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container mt-3">
    <h1>About Us Founder Page</h1>

    <div class="row">
        <div class="col-auto me-auto">
            <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
                <i class="fa fa-long-arrow-left"></i>Go Back To About Us Main Page</a>
        </div>
        <div class="col-auto">
            <a href="{{ route('aboutusteam.index') }}" class="btn__go_back">
                Go To About Us Member Page <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
    <br>
    <h4>Main Member Sector</h4>
    <a href="{{ route('aboutusmember.create_founder') }}" class="btn btn-primary">Add Founder Section</a>
    <table class="table table-dark mt-3" id="mainTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th>
                <th>Member and Team</th>
                <th>Image</th>
                <th>Video</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ourfounderPages as $founderItem)
            <tr>
                <td>{{ $founderItem->id }}</td>
                <td>{{ $founderItem->title }}</td>
                <td>
                    <!-- Add a placeholder for viewing the description -->
                    <a href="{{ route('aboutusmember.detail', $founderItem->id) }}" class="btn btn-primary">View Description</a>
                </td>
                    <!-- Member and Team -->
                <td>{{ $founderItem->section }}</td>
                <td>
                    @if ($founderItem->images->count() > 0)
                        <img src="{{ asset($founderItem->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                    @endif
                </td>
                <td>
                    <!--Video status -->
                    @if ($founderItem->video)
                        <span class="badge bg-success">Available</span>
                    @else
                        <span class="badge bg-danger">Not Available</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('aboutusmember.edit_founder', $founderItem->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <!-- Add button for deleting (you can use a form for better security) -->
                    <form action="{{ route('aboutusmember.delete_founder', $founderItem->id) }}" method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this founder section?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>

@include('frontend/login/login')
@endsection