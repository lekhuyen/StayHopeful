@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <div class="container mt-3">
        @can('user_add')
            <a href="{{ route('staff.create') }}" class="btn btn-primary">Add New User</a>
        @endcan
        <h1>Admin List</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><span>{{ $user->name }}</span></td>
                        <td><span>{{ $user->email }}</span></td>
                        <td>
                            @can('user_edit')
                                <a href="{{ route('staff.edit', $user->id) }}" class="btn btn-warning"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                            @endcan
                            @can('user_delete')
                                <a href="{{ route('staff.delete', $user->id) }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
