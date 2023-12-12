@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mt-3">
        <table class="table table-hover">
            <a href="{{ route('projectAd.index') }}"><i class="fas fa-long-arrow-alt-left"> Go Back</i></a>
            <h1 style="color:cornflowerblue; text-align:center">Unused</h1>
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Received</th>
                    <th>Goals</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="project-table">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ strip_tags($project->description) }}</td>
                        <td>{{ $project->money }}</td>
                        <td>{{ $project->money2 }}</td>
                        <td>
                            @if ($project->status == 1)
                                <a data-finish="{{ $project->id }}" class="btn btn-primary project-finish">Finish</a>
                            @else
                                <a data-unfinish="{{ $project->id }}"
                                    class="btn btn-warning project-unfinish">Unfinished</a>
                            @endif
                        </td>
                        <td>
                            @if ($project->images->count() > 0)
                                <img src="{{ asset($project->images[0]->image) }}" width="100">
                            @endif
                        </td>
                        @if ($project->category->id == $project->category_id)
                            <td>
                                {{ $project->category->name }}
                            </td>
                        @endif
                        <td>
                            <a class="btn btn-secondary" href="{{ route('project-untrash', $project->id) }}"><i
                                class="fa-solid fa-clock-rotate-left"></i></a>
                            <a class="btn btn-danger" href="{{ route('project-forcedelete', $project->id) }}"><i
                                class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align:center">Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
