@extends('frontend.adminpage.index')
@section('admin_content')
@section('title','Admin List')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <h1>Admin List</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roles</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><span>{{ $user->name }}</span></td>
                        <td>
                            @foreach ($user->roles as $role)
                                <a href="{{ route('roles.edit', $role->id) }}" style="text-decoration: none; color: red">{{$role->name}}</a>
                            @endforeach
                        </td>
                        <td><span>{{ $user->email }}</span></td>
                        <td>
                            @can('user_edit')
                                <a href="{{ route('staff.edit', $user->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                            @if($user->id != auth()->user()->id)
                                @can('user_delete')
                                    <a href="{{ route('staff.delete', $user->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                @endcan
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="general__pagination">
            {{ $users->links() }}
        </div>

        <div class="d-flex justify-content-center btn__center">
            @can('user_add')
                <a href="{{ route('staff.create') }}" class="btn btn-primary">Create New Admin Account</a>
            @endcan
        </div>
    </div>
@endsection
