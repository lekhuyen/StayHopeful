<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('authlogincss/login.css') }}">

<div class="container-popup scroll-form-signin-signup" style="z-index: 10;">
    <div class="modal-inner">
    </div>
    <div class="container-login" id="form-login" >
        <div class="exit-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="container-login-register">
        <div class="forms-container"> 
            <div class="signin-signup">
                
                {{-- Login --}}
                <form id="loginForm" class="sign-in-form" method="POST">
                    <h2 class="form-title">Sign In</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input id="login-email" type="text" placeholder="Email" name="name"/>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input id="login-password" type="password" placeholder="Password" name="password"/>
                        <div class="eye"><i class="far fa-eye"></i></div>
                        <small></small>
                    </div>
                    <button id="btn-sign-in" type="submit" class="btn solid">Sign In</button>

                    <p class="social-text">Or Sign in with social platform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                {{-- Register --}}
                <form id="registerForm" action="{{route("auth.register")}}" class="sign-up-form" method="POST">
                    @csrf
                    <h2 class="form-title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input id="register-name" type="text" placeholder="Name" name="name"/>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input id="register-email" type="text" placeholder="Email" name="email"/>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input id="register-password" type="password" placeholder="Password"  name="password"/>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input id="register-confirm-password" type="password" placeholder="Confirm Password" name="confirm_password"/>
                        <small></small>
                    </div>
                    <button id="btn-sign-up" type="submit" class="btn solid">Sign Up</button>

                    <p class="social-text">Or Sign up with social platform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nihil atque officia.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>

                <img src="img/logo.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nihil atque officia.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>

                <img src="img/logo.svg" class="image" alt="">
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
    <script>

    $(document).ready(function() {
    var containerLoginRegister = document.querySelector(".container-login-register");
    // Intercept the form submission
    // ajax register
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        // Perform client-side validation if needed
        let isValid = checkValidateRegister();
        if (isValid) {
        // Send the form data to the server using Ajax
        $.ajax({
            type: 'POST',
            url: "{{route('auth.register')}}",
            data: $('#registerForm').serialize(),
            success: function(response) {
                if(response.status == 'success'){
                // Handle the server response
                console.log(response);
                // window.location.href = "{{route('/')}}"; 
                containerLoginRegister.classList.remove("sign-up-mode");
                } else if (response.status == 'error'){
                    setError(registerEmail,'Email đã tồn tại');
                }
            },
            error: function(error) {
                // Handle errors
                console.log(error);
            }
        });
    }
    });


    // Login form submit handler
$('#loginForm').submit(function(e) {

e.preventDefault();
let isValid = checkLogin();
    if (isValid) {
    
$.ajax({
    url: "{{route('auth.login')}}",
    method: 'POST',
    data: {
        _token: "{{ csrf_token() }}",
        email: $('#login-email').val(),
        password: $('#login-password').val()
    },
    success: function(response){
        if(response.status == 'success'){
            // Login successfully
            alert("Login Successfully");
            console.log(response.message);
            if(response.role == 1){
                window.location.href = "{{route('admin.index')}}"; 
            }
            else if(response.role == 0){
                window.location.href = "{{route('/')}}"; 
            }
        }
        else if(response.status == 'email_error'){
            setError(loginEmail,'Must verify email before login');
        }else{
            // Display error 
            alert(response.message);
        }
    }
});
    }
});
});
    </script>
