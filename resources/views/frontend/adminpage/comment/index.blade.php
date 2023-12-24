@extends('frontend.adminpage.index')
@section('admin_content')
@section('title','Comment List')
<div class="container mt-3 table-responsive">
    <h1>Comment Post</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>CONTENT</th>
                <th>REPORT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comments as $comment)
                <tr class="comment-table" data-id="{{ $comment->id }}">
                    <td>{{ $comment->id }}</td>
                    <td>
                        <a style="text-decoration: none; color:cornflowerblue"
                            href="">{{$comment->user->name}}</a>
                    </td>
                    
                    <td>
                        {{ $comment->content }}
                    </td>
                    <td>
                        @if ($comment->status == 0)
                            <span data-choduyet="" class="post-choduyet">
                                <span class="badge bg-warning rounded-pill status__userpost" style="cursor: pointer">REPORT</span>
                            </span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-danger delete-post delete_comment-post-user" data-id="{{ $comment->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
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
        {{$comments->links()}}
    </div>

    
</div>
<div class="container mt-3 table-responsive">
    <h1>Reply Comment</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>CONTENT</th>
                <th>REPORT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($replies as $reply)
                <tr class="comment-table" data-id="{{ $reply->id }}">
                    <td>{{ $reply->id }}</td>
                    <td>
                        <a style="text-decoration: none; color:cornflowerblue"
                            href="">{{$reply->user->name}}</a>
                    </td>
                    
                    <td>
                        {{ $reply->content }}
                    </td>
                    <td>
                        @if ($reply->status == 0)
                            <span data-choduyet="" class="post-choduyet">
                                <span class="badge bg-warning rounded-pill status__userpost" style="cursor: pointer">REPORT</span>
                            </span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-danger delete-post delete_comment-post-user" data-id="{{ $reply->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
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
        {{$replies->links()}}
    </div>

    
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    //delete-comment
    $(document).ready(function() {
        $('.delete_comment-post-user').click(function(e) {
            e.preventDefault();
            var comment_id = $(this).data('id')
            var _csrf = '{{ csrf_token() }}';
            var elementComment = $('.comment_post')
            var _loginUrl = '{{ route('delete-comment', ':id') }}'.replace(':id', comment_id);
            
            $.ajax({
                type: 'DELETE',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        $('#comment_parent-post[data-id="' + comment_id + '"]').remove();
                        $('.comment-table[data-id="' + comment_id + '"]').remove();

                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
    })
    })

</script>