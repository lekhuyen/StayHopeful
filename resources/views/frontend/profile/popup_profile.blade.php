<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('profilecss/popup_profile.css') }}">
    {{-- profile popup --}}

    <div class="popup-profile-container" style="z-index: 10;">
        <div class="modal-inner-profile">
        </div>
        <div class="profile-popup">
            <div class="profile-menu">
                <div class="user-info">
                    <img src="{{ asset('img/img1.jpg') }}" alt="">
                    @if (session('userInfo'))
                        <h4>{{session('userInfo')['name']}}</h4> 
                    @endif
                </div>
                <hr>
                <div>
                    <a href="{{route('auth.profile')}}" class="profile-menu-link">
                        <i class="fa-solid fa-user"></i>
                        <p>Profile</p>
                        <span>></span>
                    </a>
                </div>
                <hr>
                <div>
                    <a href="#" class="profile-menu-link">
                        <i class="fa-solid fa-key"></i>
                        <p>Change Password</p>
                        <span>></span>
                    </a>
                </div>
                <hr>
                <div>
                    <a href="{{route('logout')}}" class="profile-menu-link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
       
        // popup
    var profileDropdown = document.querySelector('.profile-popup');
    var popupProfile = document.querySelector('.popup-profile');
    var containerPopupProfile = document.querySelector('.popup-profile-container');
    var exitProfile = document.querySelector('.modal-inner-profile');
    //console.log(containerPopup);
    if(popupProfile){
    popupProfile.addEventListener('click', function () {
        containerPopupProfile.classList.toggle('showProfileDropdown');
        // profileDropdown.classList.toggle('open-popup-profile');
    });
    containerPopupProfile.addEventListener('click', function () {
    containerPopupProfile.classList.remove('showProfileDropdown');
    // profileDropdown.classList.remove('open-popup-profile');
    })
    }
    </script>
   