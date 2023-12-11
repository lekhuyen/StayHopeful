@extends('frontend.adminpage.index')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('admincss/project.css') }}">
<link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <div class="container mt-3">
        <h1>List News</h1>
        <a class="btn btn-primary "href="{{route('news-image-trash')}}" target="_blank">Trash Image</a>
        @can('news_add')
            <a class="btn btn-primary "href="{{route('news.create')}}">Create News</a>
        @endcan
        <a class="btn btn-primary "href="{{route('news-trash')}}" target="_blank">Trash News</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                    <tr class="news-table">
                        <td>{{$new->id}}</td>
                        <td><span class="pj__description">{{$new->title}}</span></td>
                        <td><span class="pj__description">{{$new->description}}</span></td>
                        <td>
                            @if($new->images->count() > 0)
                                <img src="{{asset($new->images[0]->image)}}" width="100">
                            @endif
                        </td>
                        <td>
                            @can('news_delete')
                                <button class="btn btn-danger delete-news" data-id="{{$new->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            @endcan
                            @can('news_edit')
                                <a  class="btn btn-warning" href="{{route('news.edit', $new->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$news->links()}}
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('.delete-news').click(function(){
            var newsId = $(this).data('id');
            var newsTable = $(this).closest('.news-table');

            var _csrf = '{{ csrf_token() }}';

            $.ajax({
                type: "POST",
                url: '{{ route('news.delete',':id')}}'.replace(':id',newsId),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id:newsId,
                    _token:_csrf
                },
                success: function(data){

                    newsTable.remove()
                },
                error: function(error) {
                    alert(error);
                }
            })
        })
    })
</script>
