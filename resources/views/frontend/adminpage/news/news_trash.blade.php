@extends('frontend.adminpage.index')
@section('admin_content')
<div class="container mt-3">
    <table class="table table-hover">
        <thead>'
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($news as $new)
                <tr class="project-table">
                    <td>{{$new->id}}</td>
                    <td>{{$new->title}}</td>
                    <td>{{strip_tags($new->description)}}</td>

                    <td>
                        @if($new->images->count() > 0)
                            <img src="{{asset($new->images[0]->image)}}" width="100">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('news-untrash',$new->id) }}">RESTORE</a>
                        <a class="btn btn-danger" href="{{ route('news-forcedelete',$new->id) }}">DELETE</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center">Trash emtry</td>
                </tr>
                
            @endforelse
        </tbody>
    </table>
</div>
@endsection