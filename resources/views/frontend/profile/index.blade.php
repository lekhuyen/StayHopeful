@extends('frontend.site')
@section('main')
    {{-- profile css --}}
    <link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">
    {{-- profile css --}}

    @if (session('success'))
        <div class="container-user-post-notification showAlert">
            <div class="user-post-status-success">
                <div class="exit-user-post-alert-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
                <p style="top: 26%;">
                    Update Profile Success &#128525;<br>

                </p>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="profile-image-user">
                                @if ($userupdate->avatar)
                                    <img src="{{ asset($userupdate->avatar) }}" alt="hình nè cậu" class="profile-image-set">
                                @else
                                    <img src="{{ asset('img/convitne.jpg') }}" alt="" class="profile-image-set">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="profile-user">
                                <div class="profile-username">

                                    <span class="profile-username-text">{{ auth()->user()->name }}</span>

                                </div>
                                <div class="profile-info">
                                    @if (session('userInfo'))
                                        @if ($userupdate->is_sponsor == 1 && $userupdate->is_volunteer != 1)
                                            <p class="info-text">Role: <span class="info-text-user blink"
                                                    style="font-weight: 700">Sponsor</span></p>
                                        @elseif ($userupdate->is_sponsor != 1 && $userupdate->is_volunteer == 1)
                                            <p class="info-text">Role: <span class="info-text-user blink"
                                                    style="font-weight: 700">Volunteer</span></p>
                                        @elseif($userupdate->is_sponsor == 1 && $userupdate->is_volunteer == 1)
                                            <p class="info-text">Role: <span class="info-text-user blink"
                                                    style="font-weight: 700">Sponsor<span style="color: black">,</span> Volunteer</span></p>
                                        @endif
                                        @if ($userupdate->email != null)
                                        <p class="info-text">Email: <span
                                            class="info-text-user">{{ $userupdate->email }}</span></p>
                                        @else
                                        <p class="info-text">Email: <span
                                            class="info-text-user">Updated your information</span></p>
                                        @endif

                                        @if ($userupdate->age != null)
                                        <p class="info-text">Age: <span
                                            class="info-text-user">{{ $userupdate->age }}</span></p>
                                        @else
                                        <p class="info-text">Age: <span
                                            class="info-text-user">Updated your information</span></p>
                                        @endif

                                        @if ($userupdate->phone != null)
                                        <p class="info-text">Phone: <span
                                            class="info-text-user">{{ $userupdate->phone }}</span></p>
                                        @else
                                        <p class="info-text">Phone: <span
                                            class="info-text-user">Updated your information</span></p>
                                        @endif

                                        @if ($userupdate->address != null)
                                        <p class="info-text">Address: <span
                                            class="info-text-user">{{ $userupdate->address }}</span></p>
                                        @else
                                        <p class="info-text">Address: <span
                                            class="info-text-user">Updated your information</span></p>
                                        @endif  
                                    @endif
                                </div>
                                <button class="profile-edit-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit
                                    Profile</button>
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
                                    @if ($userinfo)
                                        <tr>
                                            <td>{{ $userinfo->id }}</td>
                                            <td>{{ $userinfo->users->name }}</td>
                                            <td>{{ $userinfo->project->title }}</td>
                                            <td style="color: #27AE60;">{{ $userinfo->amount }}$</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4">You Dont Have Any Donate Yes! :(</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="profile-post">
                        <button class="profile-edit-info user-post-form">Post</button>
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
                                            <div
                                                style="margin:10px 0 20px 0; text-align: center; padding-bottom: 20px; margin-bottom: 40px;">
                                                <img width="80%" height="400px" src="{{ asset($image->image) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="like_post post_like-comment-post" data-post-id="{{ $post->id }}"
                                    style="cursor: pointer">

                                    {{-- ! phân biệt user đã like --}}
                                    @if (auth()->user())
                                        @if ($post->likes->where('id_user', '=', auth()->user()->id)->first() != null)
                                            <div>
                                                <i class="fa-solid fa-heart like_icon"
                                                    data-post-id="{{ $post->id }}"></i>
                                            </div>
                                        @else
                                            <div>
                                                <i class="fa-solid fa-heart" data-post-id="{{ $post->id }}"></i>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="like_count">
                                        <span class="count_like"
                                            data-post-id="{{ $post->id }}">{{ $post->likes->count() == 0 ? '' : $post->likes->count() }}</span>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('post.updateprofile', session('userInfo')['id']) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="{{ $userupdate->email }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="age" class="form-label">Age:</label>
                            <input type="number" class="form-control" id="age" placeholder="Enter age"
                                name="age" value="{{ $userupdate->age }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter phone"
                                name="phone" value="{{ $userupdate->phone }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address"
                                name="address" value="{{ $userupdate->address }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="images" class="form-label">Change Avatar:</label>
                            <input type="file" class="form-control" id="images" placeholder="Choose Image"
                                name="images">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('frontend/profile/post_form')

    @include('frontend/profile/popup_profile')

    @include('frontend.profile.form_post')
@endsection
