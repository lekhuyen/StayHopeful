@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('admincss/project.css') }}">
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <div class="container mt-3">
        <h1>Project List</h1>
        <a class="btn btn-primary "href="{{ route('projectAd-image') }}" target="_blank">Unused Image</a>
        <a class="btn btn-primary "href="{{ route('project-trash') }}" target="_blank">Unused Project</a>
        @can('project_add')
            <a href="{{ route('projectAd.create') }}" class="btn btn-primary">Create</a>
        @endcan
        <table class="table table-hover">
            <thead>
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
                        <td>{{ $project->id }}</td>
                        <td><span class="pj__description">{{ $project->title }}</span></td>
                        <td><span class="pj__description">{!! $project->description !!}</span></td>
                        <td>{{ $project->money }}</td>
                        <td>{{ $project->money2 }}</td>
                        <td>
                            @if ($project->status == 1)
                                <a data-finish="{{ $project->id }}" class="project-finish"><span
                                        class="badge bg-success">Finished</span></a>
                            @else
                                <a data-unfinish="{{ $project->id }}" class="project-unfinish"><span
                                        class="badge bg-warning">Unfinished</span></a>
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
                            @can('project_delete')
                                <button class="btn btn-danger delete-project" data-id="{{ $project->id }}"><i
                                    class="fa-solid fa-trash-can"></i></button>
                            @endcan
                            @can('project_edit')
                                <a class="btn btn-info" href="{{ route('projectAd.edit', $project->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align:center">Project emtry</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $projects->links() }}
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-project').click(function() {
            var projectId = $(this).data('id');
            var projectTable = $(this).closest('.project-table');

            var _csrf = '{{ csrf_token() }}';

            $.ajax({
                type: "POST",
                url: '{{ route('projectAd.delete', ':id') }}'.replace(':id', projectId),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: projectId,
                    _token: _csrf
                },
                success: function(data) {

                    projectTable.remove()
                },
                error: function(error) {
                    alert(error);
                }
            })
        })


        $('.project-finish').on('click', function() {
            var finishId = $(this).data('finish');


            $.ajax({
                type: "GET",
                url: '{{ route('projectAd.finish', ':id') }}'.replace(':id', finishId),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: finishId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(error) {
                    alert(error);
                }
            })

        })
        $('.project-unfinish').on('click', function() {
            var unfinishId = $(this).data('unfinish');


            $.ajax({
                type: "GET",
                url: '{{ route('projectAd.unfinish', ':id') }}'.replace(':id', unfinishId),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: unfinishId,
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(error) {
                    alert(error);
                }
            })

        })
    })
</script>
