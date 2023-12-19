<form action="{{ route('edit.post') }}" method="post" enctype="multipart/form-data" id="form_edit-post">
    @csrf
    @method('PUT')
    <div>
        <input name="post_id" type="hidden" class="post_id-1" value="{{$post->id}}"/>
        <div class="input-post-content">
            <textarea class="post-title" name="title" id="" placeholder="Write post">{{ $post->title }}</textarea>
        </div>

        <div class="user_post-image" style="display: flex;justify-content: center; margin: 0 10px 20px 10px;">
            @foreach ($post->images as $image)
                <div class="user-post-image user_post-image">
                    <div class="user-post-image">
                        <span class="delete_img_post" data-id="{{$image->id}}" onclick="delete_image(this)" style="cursor: pointer">X</span>
                        <img class="image_post" height="200" width="100%" alt=""
                            src="{{ asset($image->image) }}" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="user-post-image">
        <input class="current_image_post" name="images[]" type="file" multiple>
    </div>
    <div class="submit-post">
        <button type="submit" class="btn btn-primary submit_edit_form">Submit</button>
    </div>
</form>
