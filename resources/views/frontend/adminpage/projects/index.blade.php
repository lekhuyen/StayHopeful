@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/project.css') }}">
    {{-- css --}}

    <div class="container mt-3 ">
        <h1>Project List</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Received</th>
                    <th>Goals</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="project-table">
                        <td>{{ $project->id }}</td>
                        @if ($project->category->id == $project->category_id)
                            <td><span class="pj__description">
                                    {{ $project->category->name }}
                                </span></td>
                        @endif
                        <td><span class="pj__description">{{ $project->title }}</span></td>
                        <td><span class="pj__description">{!! $project->description !!}</span></td>
                        <td>
                            @if ($project->images->count() > 0)
                                <img src="{{ asset($project->images[0]->image) }}" width="100">
                            @endif
                        </td>
                        <td>{{ $project->money }}</td>
                        <td>{{ $project->money2 }}</td>
                        <td>
                            @if ($project->status == 1)
                                <a data-finish="{{ $project->id }}" class="project-finish"><span
                                        class="badge bg-success status__project">Finished</span></a>
                            @else
                                <a data-unfinish="{{ $project->id }}" class="project-unfinish"><span
                                        class="badge bg-warning status__project">Unfinished</span></a>
                            @endif
                        </td>
                        <td>
                            @can('project_edit')
                                <a class="btn btn-warning" href="{{ route('projectAd.edit', $project->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                            @can('project_delete')
                                <button class="btn btn-danger delete-project" data-id="{{ $project->id }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align:center">Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="general__pagination">
            {{ $projects->links() }}
        </div>

        <div class="d-flex justify-content-center btn__center" style="gap: 10px;">
            <a class="btn btn-primary "href="{{ route('projectAd-image') }}">Unused Image</a>
            <a class="btn btn-primary "href="{{ route('project-trash') }}">Unused Project</a>
            @can('project_add')
                <a href="{{ route('projectAd.create') }}" class="btn btn-primary">Create New Project</a>
            @endcan
        </div>
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
