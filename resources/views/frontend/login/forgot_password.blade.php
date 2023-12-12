<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- css --}}
<link rel="stylesheet" href="{{ asset('authlogincss/forgotpassword.css') }}">
{{-- css --}}


{{-- input email forgot pass form --}}
<div class="container-reset-password-email-input">
    <div class="modal-inner-reset-password-email-input"></div>
    <div class="reset-password-email-input">
        <div class="exit-reset-password-email-input-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="inputEmailResetPassword" class="reset-password-email-input-form" method="POST">
            @csrf
            <h2 class="reset-password-email-input-form-title">Reset Password</h2>
            <p>Please input your email to receive OTP:</p>
            <div class="reset-password-email-input-field">
                <i class="fa-solid fa-user"></i>
                <input id="reset-password-email" type="text" placeholder="Email" name="name"/>
                <small class="reset-password-email-validate"></small>
            </div>
            <button id="btn-send-otp" class="btn solid btn-send-otp-email">Send OTP</button>
        </form>
    </div>
</div>

{{-- forgot pass form --}}
<div class="container-reset-password-form">
    <div class="modal-inner-reset-password-form"></div>
    <div class="reset-password-form-wrapper">
        <div class="exit-reset-password-form">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="resetPasswordForm" class="reset-password-form" method="POST">
            @csrf
            <h2 class="reset-password-form-title">Reset Password</h2>
            <p>Please input your OTP to reset password:</p>
            <div class="reset-password-input-field">
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input id="reset-password-otp" type="text" placeholder="OTP" name="otp"/>
                <small class="reset-password-otp-validate"></small>
            </div>
            <div class="reset-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="new-password-reset" type="password" placeholder="New Password" name="new_password"/>
                <small class="reset-password-validate"></small>
            </div>
            <div class="reset-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="confirm-new-password-reset" type="password" placeholder="Confirm New Password" name="confirm_new_password"/>
                <small class="reset-password-validate"></small>
            </div>
            <button id="btn-reset-password" type="submit" class="btn solid btn-reset-password-submit">Confirm</button>
            <p>Haven't receive OTP ?  <a class="link-resend-otp" href="#">Resend</a></p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<script src="{{asset('js/forgotpassword.js')}}"></script>