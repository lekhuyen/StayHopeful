@extends('frontend.site')
@section('main')
<link rel="stylesheet" href="{{ asset('feedbackcss/feedback.css') }}">

    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success feedback-alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>

        @endif

        <div class="container-fluid-feedback">
            <div class="row">
                <h1 class="feedback-h1">Feedback Form</h1>
                <div>
                    <img src="{{ asset('img/logo.png') }}" alt="logo" class="feedback-logo">
                </div>
                <div class="feedback">
                    <div class="card_rating">
                        <span onclick="gfg(1)" class="star">★
                        </span>
                        <span onclick="gfg(2)" class="star">★
                        </span>
                        <span onclick="gfg(3)" class="star">★
                        </span>
                        <span onclick="gfg(4)" class="star">★
                        </span>
                        <span onclick="gfg(5)" class="star">★
                        </span>
                    </div>
                    <h3 id="output">
                        Rating is: 0/5
                    </h3>
                </div>

                <form method="post" action="{{ route('feedback.store') }}">
                    @csrf
<div class="form-group p-3">
    <label for="email">Email:</label>
    <input type="text" class="form-control" value="{{ old('email') }}"
        placeholder="Enter email" name="email">
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror


    <label for="content">Content:</label>
    <textarea class="form-control" type="text" name="content" rows="5" cols="50" placeholder="Write your feedback here">{{ old('content') }}</textarea>

    @error('content')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


                    <input hidden type="number" class="form-control" value="{{ old('star', 0) }}" id="star"
                        name="star">

                    <div class="fb-btn">
                        <div class="textcenter">
                            <button type="submit" class="btn btn-success fb-setinput" name="feedback-btn"
                                id="feedback-btn">SUBMIT
                            </button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>

    <script>
        // To access the stars
        let stars =
            document.getElementsByClassName("star");
        let output =
            document.getElementById("output");
        let numberStar = document.getElementById("star");

        // Funtion to update rating
        let cls;
        function gfg(n) {
            remove(cls);
            for (let i = 0; i < n; i++) {
                if (n == 1) cls = "one";
                else if (n == 2) cls = "two";
                else if (n == 3) cls = "three";
                else if (n == 4) cls = "four";
                else if (n == 5) cls = "five";
                stars[i].classList.add(cls);
            }
            output.innerText = "Rating is: " + n + "/5";
            numberStar.value = n; //gan value vao n; numberStar la gtr of o input
        }

        // To remove the pre-applied styling
        function remove(cls) {
            let i = 0;
            while (i < 5) {
                stars[i].classList.remove(cls);
                i++;
            }
        }
    </script>

    @include("frontend/login/login")
    @include('frontend/profile/popup_profile')
@endsection
