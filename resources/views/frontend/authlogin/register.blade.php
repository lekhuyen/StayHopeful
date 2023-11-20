@extends('frontend.site')
@section('main')
<link rel="stylesheet" href="{{ asset('authlogin/login.css') }}">
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
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