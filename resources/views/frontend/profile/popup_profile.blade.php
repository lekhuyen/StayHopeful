<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('profilecss/popup_profile.css') }}">

<div class="container-change-password-notification">
    <div class="change-password-status-success">
        <div class="exit-alert-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
        <p>
            Change Password Successfully !
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
<div class="popup-change-password-container">
    <div class="modal-inner-change-password">
    </div>
    <div class="change-password-popup">
        <div class="exit-change-password-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="changePasswordForm" class="change-password-form" action="{{ route('auth.changepassword') }}"
            method="POST">
            @csrf
            <h2 class="change-password-form-title">Change Password</h2>
            <div class="change-password-input-field">
                <i class="fa-solid fa-lock"></i>
                <input id="old-password" type="password" placeholder="Current Password" name="old_password"
                    style="height: 45px;" />
                <div class="eye"><i class="far fa-eye"></i></div>
                <small class="change-password-validate"></small>
            </div>
            <div class="change-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="new-password-change" type="password" placeholder="New Password" name="new_password" />
                <small class="change-password-validate"></small>
            </div>
            <div class="change-password-input-field">
                <i class="fa-solid fa-key"></i>
                <input id="confirm-new-password-change" type="password" placeholder="Confirm New Password"
                    name="confirm_new_password" />
                <small class="change-password-validate"></small>
            </div>
            <button id="btn-change-password" type="submit" class="btn solid btn-change-password">Confirm</button>
        </form>
    </div>
</div>
{{-- profile popup dropdown --}}
<div class="popup-profile-container" style="z-index: 10;">
    <div class="profile-popup">
        <div class="profile-menu">
            <div class="user-info">
                @if (session('userInfo'))
                <div class="text popup-profile">
                    @if (session('userInfo')['avatar'])
                        <img class="nav-user-img"
                            src="{{ asset(session('userInfo')['avatar']) }}" alt="">
                    @elseif(!$infouser->avatar == null)
                        <img class="nav-user-img" src="{{ asset($infouser->avatar) }}"
                            alt="ảnh">
                    @else
                    <img class="nav-user-img" src="{{asset('img/convitne.jpg')}}" alt="">
                    @endif
                </div>
            @else
                <div class="text popup-login">LOGIN</div>
            @endif
                @if (session('userInfo'))
                    <h4>{{ session('userInfo')['name'] }}</h4>
                @endif
            </div>
            <hr>
            <div>
                <a href="{{ route('auth.profile') }}" class="profile-menu-link">
                    <i class="fa-solid fa-user"></i>
                    <p>Profile</p>
                    <span>></span>
                </a>
            </div>
            <hr>
            <div>
                <a href="{{ route('post.detail.web') }}" class="profile-menu-link">
                    <i class="fa-solid fa-users"></i>
                    <p>User Post</p>
                    <span>></span>
                </a>
            </div>
            <hr>
            <div>
                <a href="#" class="profile-menu-link change-password">
                    <i class="fa-solid fa-key"></i>
                    <p>Change Password</p>
                    <span>></span>
                </a>
            </div>
            <hr>
            <div>
                <a href="{{ route('logout') }}" class="profile-menu-link">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>Logout</p>
                    <span>></span>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<script src="{{ asset('js/popup_profile.js') }}"></script>
<script>
    //alert
    var changePasswordSuccess = document.querySelector(".container-change-password-notification");
    var errorAlert = document.querySelector(".container-error-notification");

    //change password ajax request
    $(document).ready(function() {
        $('#changePasswordForm').submit(function(e) {
            e.preventDefault();
            let isValid = checkChangePassword();
            if (isValid) {
                $.ajax({
                    url: '{{ route('auth.changepassword') }}',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        old_password: $('#old-password').val(),
                        new_password: $('#new-password-change').val()
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            changePasswordSuccess.classList.add("showAlert");
                            popupChangePassword.classList.remove('showChangePassword');
                            // window.location.href = "{{ route('/') }}";
                            $('#old-password').val(''),
                            $('#new-password-change').val('')
                            $('#confirm-new-password-change').val('')
                        } else if (response.status == 'error') {
                            errorAlert.classList.add("showAlert");
                        }
                    },
                    error: function(error) {
                        console.log(response.message);
                    }
                });
            }
        });
    });
</script>
