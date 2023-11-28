@extends('frontend.site')
@section('title', 'Donate Form')
@section('main')
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/donate.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="form-donate">
                    <form action="{{ route('detail.thanhtoan') }}" method="POST">
                        @csrf
                        <h2 class="form-donate-text">Donate Form</h2>

                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Full Name <span class="req"> *</span> </span>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control background-icon-big" id="floatingInput" name="fullname"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Enter Fullname</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-info"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hide-name-info">
                            <div class="hide-text">
                                <input type="checkbox" name="hidename" value="hidename" style="transform: scale(1.5); margin-right: 20px"> Donate Anonymously
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Email <span class="req"> *</span> </span>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="email"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Enter Email</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Phone <span class="req"> *</span> </span>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="phone"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Enter PhoneNumber</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-phone"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Select <span class="req"> *</span></span>
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="project">
                                        <option selected>Select Project</option>
                                        @foreach ($projects as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Select Type</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-earth-asia"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Select <span class="req"> *</span></span>
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="type">
                                        <option selected>Select Contribution Type</option>
                                        <option value="Bank">Online money transfer</option>
                                        <option value="Artifacts">Artifacts</option>
                                    </select>
                                    <label for="floatingSelect">Select Type</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-earth-asia"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Amount <span class="req"> *</span> </span>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="amount"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Enter Amount</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-money-bill"></i></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Message</span>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="message" style="height: 150px"></textarea>
                                    <label for="floatingTextarea">Write Yours Message</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <button class="form-info-btn" type="submit" name="redirect">Send</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @include("frontend/login/login");

@endsection
