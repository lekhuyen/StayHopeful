@extends('frontend.adminpage.index')
@section('admin_content')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('admincss/project.css') }}">
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <h1>News List</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                    <tr class="news-table">
                        <td>{{ $new->id }}</td>
                        <td><span class="news__description">{{ $new->title }}</span></td>
                        <td><span class="news__description">{{ $new->description }}</span></td>
                        <td>
                            @if ($new->images->count() > 0)
                                <img src="{{ asset($new->images[0]->image) }}" width="100">
                            @endif
                        </td>
                        <td>
                            @can('news_edit')
                                <a class="btn btn-warning" href="{{ route('news.edit', $new->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                            @can('news_delete')
                                <button class="btn btn-danger delete-news" data-id="{{ $new->id }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="general__pagination">
            {{ $news->links() }}
        </div>

        <div class="d-flex justify-content-center btn__center">
            <a class="btn btn-primary "href="{{ route('news-image-trash') }}">Unused Image</a>
            <a class="btn btn-primary "href="{{ route('news-trash') }}">Unused News</a>
            @can('news_add')
                <a class="btn btn-primary "href="{{ route('news.create') }}">Create News</a>
            @endcan
        </div>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-news').click(function() {
            var newsId = $(this).data('id');
            var newsTable = $(this).closest('.news-table');

            var _csrf = '{{ csrf_token() }}';

            $.ajax({
                type: "POST",
                url: '{{ route('news.delete', ':id') }}'.replace(':id', newsId),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: newsId,
                    _token: _csrf
                },
                success: function(data) {

                    newsTable.remove()
                },
                error: function(error) {
                    alert(error);
                }
            })
        })
    })
</script>
