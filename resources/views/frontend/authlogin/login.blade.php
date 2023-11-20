@extends('frontend.site')
@section('main')
    <link rel="stylesheet" href="{{ asset('authlogin/login.css') }}">
    
    <div id="container-2">

        <div class="container-login" id="form-login">
            <div class="form-container sign-up-container">
                <form action="#">
                    @csrf
                    <h1 class="login-title">Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input class="text-input" type="name" placeholder="Name" name="name" />
                    <input class="text-input" type="email" placeholder="Email" name="email" />
                    <div class="pass">
                        <input class="text-input" type="password" placeholder="Password" name="password" />
                        <div class="eye eye-2"><i class="far fa-eye"></i></div>
                    </div>
                    <button class="btn-signup">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                    @csrf
                    <h1 class="login-title">Sign in</h1>
                    <div class="social-container">
                        <a href="{{route('auth.facebook')}}" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{route('auth.google')}}" class="social"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input class="text-input" type="email" placeholder="Email" name="email" />
                    <div class="pass">
                        <input class="text-input" type="password" placeholder="Password" name="password" />
                        <div class="eye" ><i class="far fa-eye"></i></div>
                    </div>

                    <a href="#">Forgot your password?</a>
                    <button class="login-btn" style="margin-top: 20px">Sign In</button>
                </form>
            </div>
            <div class="overlay-container" id="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="btn-signup" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="btn-signup" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('form-login');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });

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
        //eye1
        $(document).ready(function() {
            $('.eye eye-2').click(function() {
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
