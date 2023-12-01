@extends('frontend.site')
@section('title', 'About Us')
@section('main')

<div class="container mt-3">
  <h2>About Us Team</h2>
  <a href="{{ route('aboutusteam.create') }}" class="btn btn-primary">Create a new Team</a>

  <table class="table table-dark mt-3">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Skill</th>
        <th>Status</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($aboutusteams as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->age }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->skill }}</td>
            <td>
                @if ($item->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>
            <td>{{ $item->description }}</td>
            <td>
                @if ($item->images->count() > 0)
                    <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                @endif
            </td>
            <td>
              <a href="{{ route('aboutusteam.edit_aboutus', $item->id) }}" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <form action="{{ route('aboutusteam.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team member?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@include('frontend/login/login');
@endsection