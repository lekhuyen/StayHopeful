@extends('frontend.adminpage.index')
@section('admin_content')
@section('title','Role List')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <h1>Role List</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Roles</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td><span>{{ $role->name }}</span></td>
                        <td><span>{{ $role->display_name }}</span></td>
                        <td>
                            @can('roles_edit')
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                            @can('roles_delete')
                                <a href="{{ route('roles.delete', $role->id) }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="general__pagination">
            {{ $roles->links() }}
        </div>
        <div class="d-flex justify-content-center btn__center">
            @can('roles_add')
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
            @endcan
        </div>
    </div>
@endsection
