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

                    {{-- <div class="form-group">
                        <div class="form-check-inline">
                            <label class="form-check-label" for="1">
                                <input type="radio" id="1" value="1" name="rating" class="rating"
                                    checked="checked" />
                                <span class="wpcomment-input-option-label wpcomment-label-radio">1</span>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label" for="2">
                                <input type="radio" id="2" value="2" name="rating" class="rating" />
                                <span class="wpcomment-input-option-label wpcomment-label-radio">2</span>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label" for="3">
                                <input type="radio" id="3" value="3" name="rating" class="rating" />
                                <span class="wpcomment-input-option-label wpcomment-label-radio">3</span>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label" for="4">
                                <input type="radio" id="4" value="4" name="rating" class="rating" />
                                <span class="wpcomment-input-option-label wpcomment-label-radio">4</span>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label" for="5">
                                <input type="radio" id="5" value="5" name="rating" class="rating" />
                                <span class="wpcomment-input-option-label wpcomment-label-radio">5</span>
                            </label>
                        </div>
                    </div> --}}
                    <div class="star_rating">
                        <button class="star">&#9734;</button>

                    </div>
                </form>

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

@endsection
