@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>List Category</h2>
        <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('category.delete', $category->id)}}">DELETE</a>
                            <a  class="btn btn-primary" href="{{route('category.edit', $category->id)}}">EDIT</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Category emtry</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
