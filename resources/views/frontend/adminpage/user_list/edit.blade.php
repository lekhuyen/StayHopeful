@extends('frontend.adminpage.index')
@section('admin_content')

{{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

    <div class="container mt-3">
        <div style="margin-bottom: 20px">
            <a href="{{ route('staff.index') }}"><i class="fas fa-long-arrow-alt-left"> Go Back</i></a>
        </div>
        <h1>Edit User</h1>
        <form action="{{ route('staff.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name"
                    value="{{ $user->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="tetx" class="form-control" placeholder="Enter email" name="email"
                    value="{{ $user->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Role:</label>
                <select name="role_id[]" class="form-control select2_init" multiple>
                    <option value=""></option>
                    @foreach ($roles as $role)
                        <option {{ $roleUser->contains('id', $role->id) ? 'selected' : '' }} value="{{ $role->id }}">
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('ckeditor')
    <script>
        ClassicEditor
            .create(document.querySelector('#description-project-create'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2_init').select2({
            placeholder: 'chon vai tro',
            allowClear: true,
        });
    })
</script>
