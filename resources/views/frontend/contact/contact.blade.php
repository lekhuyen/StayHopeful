@extends('frontend.site')
@section('title', 'Contact')
@section('main')
    {{-- css contactus --}}
    <link rel="stylesheet" href="{{ asset('contactus/contact.css') }}">
    {{-- css contactus --}}
@if (session('success'))
        <div class="container-user-post-notification showAlert">
            <div class="user-post-status-success">
                <div class="exit-user-post-alert-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
                <p style="top: 26%;">
                    Thanks For Contact Us We Will Reply Soon As Well &#128525;<br>
                </p>
            </div>
        </div>
    @endif
    <div class="container mt-6">
        <form method="POST" action="{{ route('contact.create') }}">
            @csrf
            <div class="container" style="margin-top:100px">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 left" style="margin-top: 30px">
                        <h4>Contact Us</h4>
                        <hr>
                        <div class="mb-3 mt-3 contact-input-form">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                value="{{ old('name') }}">
                             @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        

                        <div class="mb-3 mt-3">
                            <label for="countryCode">Phone Number:</label>
                            <div class="input-group">
                                <input type="hidden" name="countryCode" id="hiddenCountryCode" value="+84">
                                <input type="text" class="form-control rounded-start input-phone-number" id="phoneNumber"
                                    placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                            </div>
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3 mt-3 contact-input-form">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message">Message:</label>
                            <textarea type="text" class="form-control textarea input-phone-number" id="message" placeholder="Message"
                                name="message">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary pink-button" style="margin-bottom: 30px">Send</button>

                    </div>
        </form>
        <div class="col-lg-6 col-md-12 col-sm-12 middle">
            <h4>Our Contact</h4>
            <hr>
            <p>StayHopeful.com</p>
            <p>Hotline: <a href="tel:+0987654321" style="text-decoration: none; color: white">0987654321</a></p>
            <p>Email: <a href="mailto:stayhopful@gmail.com"
                    style="text-decoration: none; color: white;">contact@StayHopeful.org</a></p>
            <p>Head Office Address: </p>
            <div class="map-container" style="padding-bottom: 20px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d692.8415149638578!2d106.70265068221642!3d10.78805334576912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4b3b357777%3A0x292e9b68d9d46aa6!2zTmd1eeG7hW4gQuG7iW5oIEtoacOqbS8yIFdhcmQsIFN0cmVldCwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1703076586166!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    </div>

    </div>
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
    </script>
    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
