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
                                    @if(session('userInfo'))
                                        <span class="profile-username-text">{{session('userInfo')['name']}}</span>
                                    @endif
                                </div>
                                <div class="profile-info">
                                    <p class="info-text">Email: <span class="info-text-user">Chưa cập nhật</span></p>
                                    <p class="info-text">Age: <span class="info-text-user">Chưa cập nhật</span></p>
                                    <p class="info-text">Phone : <span class="info-text-user">Chưa cập nhật</span></p>
                                    <p class="info-text">Address : <span class="info-text-user">Chưa cập nhật</span></p>
                                </div>
                                <button class="profile-edit-info">Edit Profile</button>
                                <button class="profile-edit-info user-post-form">Post</button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-aboutme">
                        <span class="aboutme">About me</span>
                        <div class="profile-aboutme-set">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente, ea provident architecto repellendus voluptatum, assumenda natus vitae similique possimus minus nulla sed adipisci ab a temporibus, magnam consequuntur est quisquam.
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis omnis ex exercitationem libero possimus. Odio ipsa dicta, incidunt pariatur, facilis magni nam, quo atque impedit vel inventore ducimus? Quam, qui.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis incidunt possimus eum molestias beatae doloribus est eos quam illo quaerat magnam dolore, perferendis assumenda minus natus unde ipsam! Voluptatibus, quasi.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, necessitatibus reiciendis eligendi ullam voluptate placeat dolor unde harum vitae praesentium rerum architecto odio tenetur quia, mollitia libero sapiente ea nostrum.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eum autem facilis atque. Suscipit libero omnis accusamus ducimus. Est ducimus temporibus exercitationem natus, vero saepe deserunt excepturi dolorum nesciunt sequi.
                        </div>
                        <button class="profile-edit-aboutme">Edit Aboutme</button>
                    </div>
                    <div class="profile-listdonate">
                        <span class="listdonate">List Donate</span>
                        <div class="profile-table" id="style-1">
                            <table class="table table-striper" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Project</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Báo Siêu Cấp</td>
                                        <td>Con mèo bị con chó cắn</td>
                                        <td>100.000VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-user-post-1">
        {{-- -------------------- --}}
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
                    @if(session('userInfo'))
                        <p>{{session('userInfo')['name']}}</p>
                    @endif
                </div>
                
            </div>
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
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
@endsection

