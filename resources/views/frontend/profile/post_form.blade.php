<div class="modal-user-post-1">
    <div class="modal_inner-post">
        <div class="post-header">

            <div class="close-icon">
                <div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            <div class="post-header-title">
                <h1>Create Post</h1>
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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-post-content">
                <textarea name="title" id="" placeholder="content.."></textarea>
            </div>
            <div class="user-post-image">
                <input type="file" multiple name="image[]">
            </div>
            <div class="submit-post">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>