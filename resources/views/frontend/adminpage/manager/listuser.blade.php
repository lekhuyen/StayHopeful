@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'User List')
{{-- css --}}
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('admincss/listuser.css') }}">
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

<div class="container">
    @if (session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="text-danger">{{ session('error') }}</div>
    @endif
    <div class="row d-flex justify-content-between mt-5 position-relative">
        <div class="col-lg-6">
            <div class="search">
                <div class="search-container">
                    <input type="search" placeholder="Input User Name to search" id="search" name="search"
                        class="form-control input-search">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="btnsearch position-absolute " style="right: 0;">
                <button class="btn-search" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                        class="fa-solid fa-plus"></i><span>Create New User Account</span></button>
            </div>
        </div>
    </div>
    <div class="row row-rs">
        <div class="col-12 mt-5">
            <h1>User List</h1>
            <div class="form-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="data_all">
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->avatar == null)
                                        <img src="{{ asset('img/user.png') }}" class="image-hover" width="50px"
                                            height="50px"
                                            style="border-radius: 50%; margin-right: 20px">{{ $item->name }}
                                    @else
                                        <img src="{{ asset($item->avatar) }}" class="image-hover" width="50px"
                                            height="50px"
                                            style="border-radius: 50%; margin-right: 20px">{{ $item->name }}
                                    @endif
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->role == '1')
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == '1')
                                        <button data-user-id="{{ $item->id }}" data-status="0"
                                            class="badge bg-success rounded-pill change-status">Active</button>
                                    @else
                                        <button data-user-id="{{ $item->id }}" data-status="1"
                                            class="badge rounded-pill bg-danger change-status">inactive</button>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    <a href="#" data-user-id="{{ $item->id }}" class="btn btn-warning"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen-to-square"></i></i>
                                    </a>
                                    <a href="{{ route('admin.deleteuser', $item->id) }}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody id="content" class="searchdata"></tbody>
                </table>

                <div class="general__pagination">
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- popup --}}
<!-- Modal create -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User Account</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.registeruser') }}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3 mt-3">
                        <label for="name-add" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name-add" placeholder="Enter Name"
                            autocomplete="off" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email-add" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email-add" placeholder="Enter Email"
                            autocomplete="off" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password"
                            name="password" value="{{ old('password') }}">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="role-register" class="form-label">Role:</label>
                        <select class="form-select" id="role-register" aria-label="Default select example"
                            name="role" value="{{ old('role') == 'role' ? 'selected' : '' }}">
                            <option selected>Select</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    @error('role')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- update --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Account</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            @foreach ($user as $item)
                <form method="POST" action="{{ route('admin.updateuser', ['id' => $item->id]) }}">
            @endforeach
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="mb-3 mt-3">
                    <label for="id" class="form-label">ID:</label>
                    <input type="text" class="form-control" id="id" disabled name="id"
                        value="1">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name-update" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name-update" placeholder="Enter Name"
                        autocomplete="off" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="password-update" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password-update" placeholder="Enter Password"
                        autocomplete="off" name="password">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email-update" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email-update" placeholder="Enter Email"
                        autocomplete="off" name="email">
                </div>
                <div class="mb-3 mt-3">
                    <label for="role-register" class="form-label">Role:</label>
                    <select class="form-select" aria-label="Default select example" id="role-update" name="role">
                        <option selected>Select</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        @if ($errors->any())
            $('#exampleModal2').modal('show'); 
        @endif
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.data_all').hide();
                $('#content').show();
            } else {
                $('.data_all').show();
                $('#content').hide();
            }
            $.ajax({
                type: "GET",
                url: "/admin/searchlistuser",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#content').html(data);
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('user-id');
            var form = $('#exampleModal form');
            var action = form.attr('action');
            form.attr('action', action.replace(/\/\d+$/, '/' + id));
            $.ajax({
                type: 'GET',
                url: '/admin/updateuser/' + id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#name-update').val(data.name);
                    $('#email-update').val(data.email);
                    $('#role-update').val(data.role);
                    if (data.status == 0) {
                        $('#status-update').prop('checked', true);
                    } else {
                        $('#status-update2').prop('checked', true);
                    }
                }
            })
        });
        $('.change-status').on('click', function() {
            var userId = $(this).data('user-id');
            var newStatus = $(this).data('status');
            $.ajax({
                type: 'POST',
                url: '/admin/changeuserstatus/' + userId,
                data: {
                    'status': newStatus,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    // Update the UI or handle success as needed
                    location.reload();
                },
                error: function(error) {
                    // Handle error or show a message
                    console.error(error);
                }
            });
        });
    })
</script>
@endsection
