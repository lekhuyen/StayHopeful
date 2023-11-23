@extends('frontend.site')
@section('title', 'Feedback')
@section('main')

    <div class="container-fluid-feedback">
        <div class="row">
            <h1 class="feedback-h1">Feedback Form</h1>
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="feedback-logo">
            </div>


            <form method="post" action="#">
                @csrf




                <div class="fb-textarea">
                    <textarea name="feedback_text" id="feedback_text" cols="40" rows="5" placeholder="Your feedback here..."></textarea>
                </div>
                <div class="fb-btn">
                    <div class="textcenter">
                        <button type="submit" class="btn btn-success fb-setinput" name="feedback-btn"
                            id="feedback-btn">SEND
                        </button>
                    </div>
                </div>
        </div>
    </div>

    </form>
@endsection
