@extends('frontend.site')
@section('main')
    <link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="profile-image-user">
                                <img src="{{ asset('img/omg.jpeg') }}" alt="hình nè cậu" class="profile-image-set">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="profile-user">
                                <div class="profile-username">
                                    
                                    <span class="profile-username-text">{{ auth()->user()->name }}</span>
                                    
                                </div>
                                <div class="profile-info">
                                    @if (session('userInfo'))
                                        <p class="info-text">Email: <span
                                                class="info-text-user">{{ session('userInfo')['email'] }}</span></p>
                                    @endif
                                    <p class="info-text">Age: <span class="info-text-user">Chưa cập nhật</span></p>
                                    <p class="info-text">Phone : <span class="info-text-user">Chưa cập nhật</span></p>
                                    <p class="info-text">Address : <span class="info-text-user">Chưa cập nhật</span></p>
                                </div>
                                <button class="profile-edit-info">Edit Profile</button>
                                <button class="profile-edit-info user-post-form">Post</button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-listdonate">
                        <span class="listdonate">List Donate</span>
                        <div class="profile-table" id="style-1">
                            <table class="table table-striper">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Project</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userinfo as $user)
                                        <tr>
                                            @if (session('userInfo')['id'] == $user->users_id)
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->users->name }}</td>
                                                <td>{{ $user->project->title }}</td>
                                                <td style="color: #27AE60;">{{ $user->amount }}$</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="profile-aboutme post_user-web">

                            <div class="profile-aboutme-set">

                                <div style="padding: 0; border-radius: 5px; position: relative;">
                                    <div class="post-uset-body"
                                        style="text-align:left; 
                                        display: flex; 
                                        align-items:center;
                                        justify-content: space-between;
                                        ">
                                        <div
                                            style="text-align:left; 
                                                    display: flex; 
                                                    align-items:center;">
                                            <a href='#' class="avatar-user-post" style="margin: 10px 0 10px 25px;">
                                                <img src="{{ asset('https://img.meta.com.vn/Data/image/2021/09/21/anh-meo-cute-hoat-hinh-1.jpg') }}"
                                                    alt="" width="50"
                                                    style=" width: 80px;clip-path: circle(30%);">
                                            </a>
                                            <div>
                                                <p style="margin-bottom: 0; font-size: 20px; font-weight: 500;">
                                                    {{ $post->user->name }}</p>
                                                <p style="margin-bottom: 0; font-size: 13px; font-weight: 500;">
                                                    {{ $post->updated_at }}</p>
                                            </div>
                                        </div>
                                        <div class="edit_post">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </div>
                                    <div class="edit-post-user">
                                        
                                        <a class="edit_form-post"data-id="{{ $post->id }} ">Edit</a>
                                        <a class="delete_form-post"data-id="{{ $post->id }} ">Delete</a>
                                        
                                    </div>
                                    <div style="text-align:left; margin: 0 50px 20px 50px;">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                    @if ($post->images->count() > 0)
                                        @foreach ($post->images as $image)
                                            <div style="margin:10px 0 20px 0; text-align: center; padding-bottom: 20px; margin-bottom: 40px;">
                                                <img width="80%" height="400px" src="{{ asset($image->image) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="like_post_profile" data-post-id="{{ $post->id }}">
                                    @if ($post->likes->contains('id_user', auth()->user()->id))
                                        <div>
                                            <i class="fa-solid fa-heart like_icon"  data-post-id="{{ $post->id }}"></i>
                                        </div>
                                    @else
                                        <div>
                                            <i class="fa-regular fa-heart dislike_icon" data-post-id="{{ $post->id }}"></i>
                                        </div>
                                    @endif
    
                                    <div class="like_count">
                                        <span class="count_like" data-post-id="{{ $post->id }}"></span>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal-user-post-1">
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
    </div> --}}
    @include('frontend/profile/post_form')

    @include('frontend/profile/popup_profile')

    @include('frontend.profile.form_post')
@endsection
