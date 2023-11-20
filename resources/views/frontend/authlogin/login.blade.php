@extends('frontend.site')
@section('main')
    <link rel="stylesheet" href="{{ asset('authlogin/login.css') }}">
    
    <div id="container-2">
        <div class="container-login" id="form-login">
            <div class="form-container sign-in-container">
                <form action="#">
                    @csrf
                    <h1 class="login-title">Sign in</h1>
                    <div class="social-container">
                        <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <input class="text-input" type="email" placeholder="Email" name="email" />
                    <div class="pass">
                        <input class="text-input" type="password" placeholder="Password" name="password" />
                        <div class="eye" ><i class="far fa-eye"></i></div>
                    </div> 
                    <div class="btn-signin">
                        <button style="margin-top: 20px">Sign In</button>
                    </div>
                    <div class="forget-password">
                        <a class="forget-pass" href="#">Forgot your password?</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        //eye
        $(document).ready(function() {
            $('.eye').click(function() {
                $(this).toggleClass('open');
                $(this).children('i').toggleClass('fa-eye-slash fa-eye');
                if ($(this).hasClass('open')) {
                    $(this).prev().attr('type', 'text');
                } else {
                    $(this).prev().attr('type', 'password');
                }
            });
        });
    </script>
@endsection
