@extends('frontend.site')
@section('title', 'Donate Form')
@section('main')
    {{-- donate css --}}
    <link rel="stylesheet" href="{{ asset('detaildonate(css)/donate.css') }}">
    {{-- donate css --}}

    @if (session('error'))
        <div class="container-error-notification showAlert">
            <div class="status-error">
                <div class="exit-alert-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
                <p>
                    Payment failed, please try again! &#128542;
                </p>
            </div>
        </div>
        {{session('error')}}
    @endif
    @error('amount')
        <div class="container-error-notification showAlert">
            <div class="status-error">
                <div class="exit-alert-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
                <p>
                    {{ $message }}
                </p>
            </div>
        </div>
    @enderror

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="form-donate">
                    <form action="{{ route('detail.payment') }}" method="POST">
                        @csrf
                        <h2 class="form-donate-text">Donate Form</h2>
                        <input type="hidden" name="project_id" value="{{ request('project_id') }}">

                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Full Name <span class="req"> *</span> </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control background-icon-big" required name="fullname"
                                        value="{{ old('fullname') }}">
                                    <label>Enter Name</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-info"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hide-name-info">
                            <div class="hide-text">
                                <input type="checkbox" name="fullname" value="Anonymous"
                                    style="transform: scale(1.5); margin-right: 20px"> Donate Anonymously
                            </div>
                        </div>
                        
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Email <span class="req"> *</span> </span>
                                <div class="form-floating">
                                    @if (Auth::user())
                                        <input type="text" class="form-control" required disabled
                                            value="{{ Auth::user()->email }}">
                                        <input type="hidden" class="form-control" name="emailget"
                                            value="{{ Auth::user()->email }}">
                                    @else
                                        <input type="text" class="form-control" required name="emailget"
                                            value="{{ old('emailget') }}">
                                    @endif
                                    <label>Enter Email</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Phone <span class="req"> *</span> </span>
                                <div class="form-floating">
                                    <input type="number" class="form-control" required name="phone"
                                        value="{{ old('phone') }}">
                                    <label>Enter Phone Number</label>
                                    <div class="background-icon">
                                        <div class="profile-text-icon"><i class="fa-solid fa-phone"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                       {{-- @php
                           dd($detail)
                       @endphp --}}
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <span class="info-text">Select Project<span class="req"> *</span></span>
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="project">
                                        <option selected>Select Project</option>
                                        @foreach ($projects as $item)
                                        <option value="{{ $item->title }}" {{ request('id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Select Type</label>
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
                                    <input type="number" class="form-control" name="amount"
                                        value="{{ old('amount') }}">
                                    <label>Enter Amount</label>
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
                                    <textarea class="form-control" id="floatingTextarea" name="message" style="height: 150px">{{ old('message') }}</textarea>
                                    <label for="floatingTextarea">Write Your Message</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <button class="form-info-btn" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
{{-- 
    <script>
        var click = document.getElementById('click-exit');
        var click_ok = document.getElementById('click-exit-ok');
        var popup = document.querySelector('.pop-background'); // Fixed typo here
        click.addEventListener('click', function() {
            popup.classList.add('exit-none');
        });
        click_ok.addEventListener('click', function() {
            popup.classList.add('exit-none');
        });
    </script> --}}
    
@endsection
