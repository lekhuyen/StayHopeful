@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>List Project</h2>
        <a href="{{route('projectAd.create')}}" class="btn btn-primary">Create Category</a>
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
                    <tr class="project-table">
                        <td>{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->money}}</td>
                        <td>{{$project->money2}}</td>
                        <td>
                            @if ($project->status == 1)
                                <a href="">Finish</a>
                            @else
                                <a href="">Unfinished</a>
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
                            <button class="btn btn-danger delete-project" data-id="{{$project->id}}">DELETE</button>
                            <a  class="btn btn-primary" href="{{route('projectAd.edit', $project->id)}}">EDIT</a>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('.delete-project').click(function(){
            var projectId = $(this).data('id');
            var projectTable = $(this).closest('.project-table');
            console.log(projectTable)
            var _csrf = '{{ csrf_token() }}';

            $.ajax({
                type: "POST",
                url: '{{ route('projectAd.delete',':id')}}'.replace(':id',projectId),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id:projectId, 
                    _token:_csrf
                },
                success: function(data){
                    
                    projectTable.remove()
                },
                error: function(error) {
                    alert(error);
                }
            })
        })
    })
</script>