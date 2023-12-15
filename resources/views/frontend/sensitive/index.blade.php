@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('feedback.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    <div class="sensitive-detail">
        <h1>Sensitive Word List</h1>
        <div class="container mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Word</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sensitives as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->word }}</td>
                            <td>{{ $item->status ? 'Active' : 'Deactive' }}</td>
                            <td>
                                {{-- @can('category_edit') --}}
                                <a class="btn btn-warning" href="{{ route('sensitive.edit', $item->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                                {{-- @endcan --}}
                                {{-- @can('category_delete') --}}
                                <button class="btn btn-danger" data-id="{{ $item->id }}">
                                <i class="fa-solid fa-trash-can"></i></button>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="general__pagination">
                {{ $sensitives->links() }}
            </div>
        </div>
        <div class="btn__container">
            <div class="btn_sensitive_create"><a href="{{ route('sensitive.create') }}" class="btn btn-primary">Add
                    Sensitive Word</a></div>
        </div>
    </div>
@endsection
