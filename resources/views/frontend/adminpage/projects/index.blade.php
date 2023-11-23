@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>List Project</h2>
        <a href="{{route('project.create')}}" class="btn btn-primary">Create Category</a>
        <table class="table table-hover">
            <thead>'
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Đã góp được</th>
                    <th>Cần huy động</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Category</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->money}}</td>
                        <td>{{$project->money2}}</td>
                        <td>{{$project->status}}</td>
                        <td>
                            @if($project->images->count() > 0)
                                <img src="{{asset($project->images[0]->image)}}" width="100">
                            @endif
                        </td>
                        <td>{{$project->category_id}}</td>
                        {{-- <td>
                            <a class="btn btn-danger" href="{{route('category.delete', $category->id)}}">DELETE</a>
                            <a  class="btn btn-primary" href="{{route('category.edit', $category->id)}}">EDIT</a>
                        </td> --}}
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
