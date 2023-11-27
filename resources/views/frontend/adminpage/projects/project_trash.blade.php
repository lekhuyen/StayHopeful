@extends('frontend.adminpage.index')
@section('admin_content')
<div class="container mt-3">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="project-table">
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{strip_tags($project->description)}}</td>
                    <td>{{$project->money}}</td>
                    <td>{{$project->money2}}</td>
                    <td>
                        @if ($project->status == 1)
                            <a data-finish="{{$project->id}}" class="btn btn-primary project-finish">Finish</a>
                        @else
                            <a data-unfinish="{{$project->id}}" class="btn btn-warning project-unfinish">Unfinished</a>
                        @endif
                    </td>
                    <td>
                        @if($project->images->count() > 0)
                            <img src="{{asset($project->images[0]->image)}}" width="100">
                        @endif
                    </td>
                    @if($project->category->id == $project->category_id)
                        <td>
                            {{$project->category->name}}
                        </td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="{{ route('project-untrash',$project->id) }}">RESTORE</a>
                        <a class="btn btn-danger" href="{{ route('project-forcedelete', $project->id) }}">DELETE</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center">Category emtry</td>
                </tr>
                
            @endforelse
        </tbody>
    </table>
</div>
@endsection