@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>roles list</h2>
        {{-- @can('roles_add') --}}
            <a href="{{route('roles.create')}}" class="btn btn-primary">Add</a>
        {{-- @endcan --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Roles</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td><span>{{$role->name}}</span></td>
                        <td><span>{{$role->display_name}}</span></td>
                        <td>
                            @can('roles_delete')
                                <a href="{{route('roles.delete', $role->id)}}" class="btn btn-danger">Delete</a>
                            @endcan
                            @can('roles_edit')
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

