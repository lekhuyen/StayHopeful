@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>user list</h2>
        {{-- @can('user_add') --}}
            <a href="{{route('staff.create')}}" class="btn btn-primary">Add</a>
        {{-- @endcan --}}
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
                        <td>{{$user->id}}</td>
                        <td><span>{{$user->name}}</span></td>
                        <td><span>{{$user->email}}</span></td>
                        <td>
                            @can('user_delete')
                                <a href="{{route('staff.delete', $user->id)}}" class="btn btn-danger">Delete</a>
                            @endcan
                            @can('user_edit')
                                <a href="{{route('staff.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

