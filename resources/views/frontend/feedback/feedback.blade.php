@extends('frontend.site')
@section('title', 'Feedback')
@section('main')

    <div class="container-fluid-feedback">
        <div class="row">
            <h1 class="feedback-h1">Feedback Form</h1>
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="feedback-logo">
            </div>
            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>
            <div class="fb-textarea">
                <textarea name="feedback_text" id="feedback_text" cols="40" rows="5" placeholder="Your feedback here..."></textarea>
            </div>
            <div class="fb-btn">
                <div class="textcenter">
                    <button type="submit" class="btn btn-success fb-setinput" name="feedback-btn" id="feedback-btn">SEND
                    </button>
                </div>
            </div>
        </div>

    </div>
    @include("frontend/login/login");
@endsection
