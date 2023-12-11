@extends('frontend.adminpage.index')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <div class="container mt-3">
        <h1>Add Roles</h1>
        <a class="btn btn-primary"href="{{route('roles.index')}}">Roles List</a>
        <form action="{{route('permissions.store')}}" method="POST">
            @csrf
            <div class="col-lg-12 mb-3 mt-3">
                <label for="permissions">Permissions</label>:</label>
                <select name="name" style="width:100%">
                    <option>Choose Permission</option>
                    @foreach (config('permissions.table_module') as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
                @error('permissions')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-12">
                <input type="checkbox" class="checkall">
                CheckAll
            </div>
            <div class="col-lg-12">
                <div class="card border-dark mb-3" style="max-width: 100%;">
                    <div class="row">
                        @foreach (config('permissions.module_children') as $item)
                            <div class="card-body text-dark col-md-3">
                                <label>
                                    <input class="checkbox_childrent" name="module_children[]" type="checkbox" value="{{$item}}">
                                    {{$item}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    $(document).ready(function() {
        $('.checkall').on('click',function(){
            $(this).parents().find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
            $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
        })
    })
</script>
