@extends('frontend.site')
@section('main')
    <link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="profile-form">
                    <div class="profile-img">
                        <div class="profile-img-show">
                        </div>
                    </div>
                    <div class="profile-text">
                        USERNAME
                    </div>
                    <div class="profile-post">
                        <button>New Post +</button>
                    </div>
                    <div class="profile-icon">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profile-form-2" >
                    <div class="profile-text-2">
                        Profile
                    </div>
                    <div class="profile-about">
                        <div class="profile-about-text">
                            SomeThing About me.....
                        </div>
                    </div>
                    <div class="profile-history">
                        <span>Donate History</span>
                    </div>
                    <div class="profile-donate-table">
                        <table class="table table-striper">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Con Mèo Và Con Chó</td>
                                    <td>200.000 VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
