@extends('frontend.site')
@section('main')
    <link rel="stylesheet" href="{{ asset('authlogincss/login.css') }}">
    
    <div id="container-2">
        <div class="container-login" id="form-login">
            <div class="form-container sign-in-container">
                <form action="#">
                    @csrf
                    <h1 class="login-title">Sign in</h1>
                    <div class="social-container">
                        <div class="login-fb">
                            <a href="" class="social">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="login-gg">
                            <a href="" class="social">
                                <i class="fa-brands fa-google"></i>
                            </a>
                        </div>
                    </div>
                    <input class="text-input" type="email" placeholder="Email" name="email" />
                    <div class="pass">
                        <input class="text-input" type="password" placeholder="Password" name="password" />
                        <div class="eye" ><i class="far fa-eye"></i></div>
                    </div> 
                    <div class="btn-signin">
                        <button style="margin-top: 20px">Sign In</button>
                    </div>
                    <div class="forget-password-signup">
                        <a class="forget-pass" href="#">Forgot your password?</a>
                        <a class="a-signup" href="#">Sign Up</a>
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
