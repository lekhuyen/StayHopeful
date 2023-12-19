<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- css --}}
<link rel="stylesheet" href="{{ asset('authlogincss/forgotpassword.css') }}">
<link rel="stylesheet" href="{{ asset('authlogincss/spinner.css') }}">
{{-- css --}}

{{-- spinner-loader --}}
<div id="spinner-container" style="display: none;">
    <div id="spinner"></div>
</div>

<div class="container-send-email-notification">
    <div class="send-email-status-success">
        <div class="exit-alert-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <img class="img-alert" src="{{asset('img/logo.svg')}}" alt="">
            <p>
                Sent OTP Successfully !
                <br>
                Please check your email to receive your OTP.
            </p>
    </div>
</div>
<div class="container-reset-pass-notification">
    <div class="reset-pass-status-success">
        <div class="exit-alert-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <img class="img-alert" src="{{asset('img/logo.svg')}}" alt="">
            <p>
                Reset Password Successfully !
                <br>
                Please input your new password next time you login.
            </p>
    </div>
</div>
<div class="container-error-notification">
    <div class="status-error">
        <div class="exit-alert-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
        <p>
            Somethings went wrong !
            <br>
            Please try again later.
        </p>
    </div>
</div>
{{-- input email forgot pass form --}}
<div class="container-reset-password-email-input">
    <div class="modal-inner-reset-password-email-input"></div>
    <div class="reset-password-email-input">
        <div class="exit-reset-password-email-input-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="inputEmailResetPassword" class="reset-password-email-input-form" method="POST">
            {{-- @csrf --}}
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
        <form id="resetPasswordForm" class="reset-password-form">
            {{-- @csrf --}}
            <h2 class="reset-password-form-title">Reset Password</h2>
            <p>Please input your OTP to reset password:</p>
            <input type="hidden" id="email_verify_otp">
            <div class="reset-password-input-field">
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input id="reset-password-otp" type="text" placeholder="OTP" name="otp"/>
                <small class="reset-password-otp-validate"></small>
            </div>
            <div class="reset-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="new-password-reset" type="password" placeholder="New Password" name="new_password"/>
                <small class="reset-password-otp-validate"></small>
            </div>
            <div class="reset-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="confirm-new-password-reset" type="password" placeholder="Confirm New Password" name="confirm_new_password"/>
                <small class="reset-password-otp-validate"></small>
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

<script>
    var sentOtpSuccessfully = document.querySelector('.btn-send-otp-email');
    var resetPasswordForm = document.querySelector('.container-reset-password-form');

    //alert
    var sendEmailSuccess = document.querySelector(".container-send-email-notification");
    var resetPassSuccess = document.querySelector(".container-reset-pass-notification");
    var errorAlert = document.querySelector(".container-error-notification");

    $(document).ready(function() {
    // ajax send otp
    $('#inputEmailResetPassword').submit(function(e) {
        e.preventDefault();
        //Perform client-side validation if needed
        let isValid = checkValidateEmailResetPass();
        if (isValid) {
        //Send the form data to the server using Ajax
        $.ajax({
            type: 'POST',
            url: "{{route('auth.send_otp')}}",
            data: {
                 _token: "{{ csrf_token() }}",
                 email: $('#reset-password-email').val(),
            },
            beforeSend: function () {
                $('#spinner-container').show();
            },
            success: function(response) {
                $('#spinner-container').hide();
                if(response.status == 'success'){
                    sendEmailSuccess.classList.add("showAlert");
                    resetPasswordForm.classList.add("showFormResetPassword");
                    $('#reset-password-email').val('');
                    console.log(response.message);
                }else if (response.status == 'update_success'){
                    sendEmailSuccess.classList.add("showAlert");
                    resetPasswordForm.classList.add("showFormResetPassword");
                    $('#reset-password-email').val('');
                    console.log(response.message);
                } else if (response.status == 'daily_error'){
                    setError(resetPassEmail,'You have reached the limited times! Please try again tomorrow');
                    console.log(response.message);
                } else if (response.status == 'time_error'){
                    setError(resetPassEmail,'Please wait 2 minutes before request a new OTP');
                    console.log(response.message);
                }
                $('#email_verify_otp').val(response.email)
            },
            error: function(error) {
                $('#spinner-container').hide();
                errorAlert.classList.add("showAlert");
                console.log(error);
            }
        });
    }
    });

    //confirm otp and change password ajax
    $('#resetPasswordForm').submit(function(e) {
        e.preventDefault();
        // Perform client-side validation if needed
        let isValid = checkResetPassword();
        if (isValid) {
        // Send the form data to the server using Ajax
        $.ajax({
            type: 'POST',
            url: "{{route('auth.verify_otp')}}",
            data: {
                 _token: "{{ csrf_token() }}",
                 user_email: $('#email_verify_otp').val(),
                 otp: $('#reset-password-otp').val(),
                 new_password: $('#new-password-reset').val(),
            },
            beforeSend: function () {
                $('#spinner-container').show();
            },
            success: function(response) {
                $('#spinner-container').hide();
                if(response.status == 'success'){
                    resetPassSuccess.classList.add("showAlert");
                    resetPasswordForm.classList.remove("showFormResetPassword");
                    $('#reset-password-otp').val(''),
                    $('#new-password-reset').val('')
                     $('#confirm-new-password-reset').val('')
                    console.log(response.message);
                } else if (response.status == 'error'){
                    console.log(response.message);
                }
            },
            error: function(error) {
                $('#spinner-container').hide();
                errorAlert.classList.add("showAlert");
                console.log(error);
            }
        });
    }
    });
});
</script>