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
        {{-- <div  id="form_edit-post"></div> --}}
        <form action="{{ route('edit.post') }}" method="post" enctype="multipart/form-data" id="form_edit-post">
            @csrf
            @method('PUT')
            <div>
                <input name="post_id" type="hidden" class="post_id" />
                <div class="input-post-content">
                    <textarea class="post-title" name="title" id="" placeholder="content.."></textarea>
                </div>

                <div class="user_post-image" style="display: flex;justify-content: center; margin: 0 10px 20px 10px;">
                    <div class="user-post-image user_post-image">
                        {{-- <div class="user-post-image">
                        <span  class="delete_img_post">X</span>

                            <img class="image_post" height="200" width="100%" alt=""/>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="user-post-image">
                <input class="current_image_post" name="images[]" type="file" multiple>
            </div>
            <div class="submit-post">
                <button type="submit" class="btn btn-primary submit_edit_form">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var modalFormPost = $('.modal-user-post-2')
    var editFromPost = $('.edit_form-post')

    $('.edit_form-post').click(function() {
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





    $('.edit_form-post').click(function(e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var url = '{{ route('post.edit', ':id') }}'.replace(':id', post_id);
        const imageContainer = document.querySelector(".user_post-image");
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
                document.querySelector('.post-title').innerText = data.post.title;
                document.querySelector('.post_id').value = post_id
                var imageInput = document.querySelectorAll('.image_post')
                let output = "";
                data.images.forEach((image, key) => {
                    output += `
                        <div class="user-post-image">
                        <span data-id="${image.id}"  class="delete_img_post" onclick="delete_image(this)">X</span>

                            <img class="image_post" height="200" width="100%" src="${image.image}" alt=""/>
                        </div>
                        `

                })
                imageContainer.innerHTML = output

            },
            error: function(error) {
                alert(error);
            }
        })
    })


    $('.delete_form-post').click(function(e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var url = '{{ route('delete.post_user', ':id') }}'.replace(':id', post_id);
        var formPost = $(this).closest('.post_user-web');
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


    // var image_id = []
    function delete_image(e) {
        let clickedElement = e

        var image_Id = $(clickedElement).data('id');
        var url = '{{ route('delete.post_image', ':id') }}'.replace(':id', image_Id);
        // image_id.push(dataId)
        // $(clickedElement).closest('.user-post-image').remove();

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


    // $('.post-title').click(function(e) {
    //     e.stopPropagation();
    // });
    // $('.current_image_post').click(function(e) {
    //     e.stopPropagation();
    // });

    // $('.delete_img_post').click(function(e) {
    //     e.stopPropagation();
    // });

    // $('#form_edit-post').click('submit', function(e) {
    //     e.preventDefault()
    //     var post_id = $('.post_id').val();
    //     var title = $('.post-title').val();

    //     var _csrf = '{{ csrf_token() }}';

    //     var url = '{{ route('edit.post') }}';

    //     var input = $('.current_image_post')[0];
    //     var files = input.files;
    //     if (files.length > 0) {
    //         var formData = new FormData();
    //         for (var i = 0; i < files.length; i++) {
    //             formData.append('images[]', files[i]);

    //         }
    //     }

    //     $.ajax({
    //         type: 'POST',
    //         url: url,
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         // enctype: 'multipart/form-data',
    //         data: {
    //             data: new FormData(this),
    //             _token: _csrf,
    //             // image_id:image_id,
    //             // post_id: post_id,
    //             // title:title,
    //             // images: formData
    //         },
    //         processData: false,
    //         contentType: false,  
    //         success: function(data) {
    //             console.log(data);
    //             // alert(data.success)
    //         },
    //         error: function(error) {
    //             alert(error);
    //         }
    //     })

    // });
</script>
