// animation
var sign_in_btn = document.querySelector("#sign-in-btn");
var sign_up_btn = document.querySelector("#sign-up-btn");
var containerLoginRegister = document.querySelector(".container-login-register");

sign_up_btn.addEventListener('click', () => {
    containerLoginRegister.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener('click', () => {
    containerLoginRegister.classList.remove("sign-up-mode");
});

// popup
var popupLogin = document.querySelector('.popup-login');
var containerPopup = document.querySelector('.container-popup');
var exitBtn = document.querySelector('.exit-btn');
var exitLogin = document.querySelector('.modal-inner');
//console.log(containerPopup);
popupLogin.addEventListener('click', function () {
    containerPopup.classList.add('showLogin');
});
exitBtn.addEventListener('click', function () {
    containerPopup.classList.remove('showLogin');
    //alert('Exit');
});
exitLogin.addEventListener('click', function () {
    containerPopup.classList.remove('showLogin');
})

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
