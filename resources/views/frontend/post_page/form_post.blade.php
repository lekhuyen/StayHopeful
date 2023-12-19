<div class="modal-user-post-2">
    <div class="modal_inner-post">
        <div class="post-header">

            <div class="close-icon close-icon-from-edit">
                <div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            <div class="post-header-title">
                <h1>Edit Post</h1>
            </div>
        </div>
        <div class="post-uset-body">
            <a href='#' class="avatar-user-post">
                <img src="{{ asset('img/omg.jpeg') }}" alt="" width="50">
            </a>
            <div class="user-name-post">
                @if (session('userInfo'))
                    <p>{{ session('userInfo')['name'] }}</p>
                @endif
            </div>

        </div>
        {{-- !form edit post --}}
        <div id="form__edit-post">
            @include('frontend.post_page.form_edit-post')
        </div>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var modalFormPost = $('.modal-user-post-2')
    var editFromPost = $('.edit_form-post-user')

    $('.edit_form-post-user').click(function() {
        modalFormPost.addClass('show-edit-post-form')
    })
    $('.close-icon-from-edit').click(function() {
        modalFormPost.removeClass('show-edit-post-form')
    })
    $('.modal-user-post-2').click(function() {
        modalFormPost.removeClass('show-edit-post-form')
    })
    $('.modal_inner-post').click(function(e) {
        e.stopPropagation()
    })


    // edit__post-user


    $('.edit_form-post-user').click(function(e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var url = '{{ route('post.edit.1', ':id') }}'.replace(':id', post_id);
        
        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                post_id: post_id,
            },
            success: function(data) {
                $('#form__edit-post').html(data);

            },
            error: function(error) {
                alert(error);
            }
        })
    })


    $('.delete_form-post-1').click(function(e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var url = '{{ route('delete.post_user', ':id') }}'.replace(':id', post_id);
        var formPost = $(this).closest('.user__post');
        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                post_id: post_id,
            },
            success: function(data) {

                formPost.remove();
            },
            error: function(error) {
                alert(error);
            }
        })
    })


    
    function delete_image(e) {
        let clickedElement = e

        var image_Id = $(clickedElement).data('id');
        var url = '{{ route('delete.post_image', ':id') }}'.replace(':id', image_Id);
        
        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            data: {
                data: image_Id,
            },
            success: function(data) {

                $(clickedElement).closest('.user-post-image').remove();

            },
            error: function(error) {
                alert(error);
            }
        })

    }


    
</script>
