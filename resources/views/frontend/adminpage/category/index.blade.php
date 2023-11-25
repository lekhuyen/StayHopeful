@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>List Category</h2>
        <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="category-table">
                        <td>{{$category->name}}</td>
                        <td>
                            <button class="btn btn-danger delete-category" data-id="{{$category->id}}">DELETE</button>
                            <a  class="btn btn-primary" href="{{route('category.edit', $category->id)}}">EDIT</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Category emtry</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('.delete-category').click(function(){
            var categoryId = $(this).data('id');
            var categoryTable = $(this).closest('.category-table');
            var _csrf = '{{ csrf_token() }}';
            
            $.ajax({
                type: "POST",
                url: '{{ route('category.delete', ':id')}}'.replace(':id', categoryId),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id:categoryId,
                    _token: _csrf,
                }, 
                success: function(data){
                    categoryTable.remove();
                }, 
                error: function(error) {
                    alert(error);
                }
            })
        })
    })
</script>