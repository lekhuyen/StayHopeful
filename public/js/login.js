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
var popupLoginResponsive = document.querySelector('.popup-login-responsive');
var containerPopup = document.querySelector('.container-popup');
var exitBtn = document.querySelector('.exit-btn');
var exitLogin = document.querySelector('.modal-inner');
//console.log(containerPopup);
if(popupLoginResponsive){
    popupLoginResponsive.addEventListener('click', function () {
        containerPopup.classList.add('showLogin');
    });
}
if(popupLogin)
{
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
}

// //popup forgot password
// var forgotPasswordLink = document.querySelector('.div-forgot-pass');
// var forgotPasswordEmailForm = document.querySelector('.container-reset-password-email-input');
// var exitSendOtpBtn = document.querySelector('.exit-reset-password-email-input-btn');
// var exitSendOtpForm = document.querySelector('.modal-inner-reset-password-email-input');
// forgotPasswordLink.addEventListener('click', function () {
//     forgotPasswordEmailForm.classList.add("showForgotPassword");
//     containerPopup.classList.remove('showLogin');
// });
// exitSendOtpBtn.addEventListener('click', function () {
//     forgotPasswordEmailForm.classList.remove("showForgotPassword");
//     containerPopup.classList.add('showLogin');
// });
// exitSendOtpForm.addEventListener('click', function () {
//     forgotPasswordForm.classList.remove("showForgotPassword");
//     containerPopup.classList.add('showLogin');
// });
// //show reset password form
// var sentOtpSuccessfully = document.querySelector('.btn-send-otp-email');
// var resetPasswordForm = document.querySelector('.container-reset-password-form');
// var exitResetPasswordFormBtn = document.querySelector('.exit-reset-password-form');
// var exitResetPasswordForm = document.querySelector('.modal-inner-reset-password-form');
// sentOtpSuccessfully.addEventListener('click', function () {
//     resetPasswordForm.classList.add("showFormResetPassword");
// });
// exitResetPasswordFormBtn.addEventListener('click', function () {
//     resetPasswordForm.classList.remove("showFormResetPassword");
// });
// exitResetPasswordForm.addEventListener('click', function () {
//     resetPasswordForm.classList.remove("showFormResetPassword");
// });
// //resend otp popup
// var linkResendPassword = document.querySelector('.link-resend-otp');
// linkResendPassword.addEventListener('click', function () {
//     resetPasswordForm.classList.remove("showFormResetPassword");
//     forgotPasswordEmailForm.classList.add("showForgotPassword");
// });
//popup alert remove
var exitAlertBtn = document.querySelector('.exit-alert-btn');
var registerSuccess = document.querySelector(".container-register-notification");
var loginSuccess = document.querySelector(".container-login-notification");
var errorAlert = document.querySelector(".container-error-notification");
exitAlertBtn.addEventListener('click', function () {
    registerSuccess.classList.remove("showAlert");
    loginSuccess.classList.remove("showAlert");
    errorAlert.classList.remove("showAlert");
});
registerSuccess.addEventListener('click', function () {
    registerSuccess.classList.remove("showAlert");
});
loginSuccess.addEventListener('click', function () {
    loginSuccess.classList.remove("showAlert");
});
errorAlert.addEventListener('click', function () {
    errorAlert.classList.remove("showAlert");
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

// register
const registerName = document.getElementById('register-name');
const registerEmail = document.getElementById('register-email');
const registerPassword = document.getElementById('register-password');
const registerConfirmPassword = document.getElementById('register-confirm-password');
const btnRegister = document.getElementById('btn-sign-up');


function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function validatePassword(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/.test(password);
}
function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}
    function checkValidateRegister() {
    let registerNameValue = registerName.value;
    let registerEmailValue = registerEmail.value;
    let registerPasswordValue = registerPassword.value;
    let registerConfirmPasswordValue = registerConfirmPassword.value;

    let isCheck = true;

    // Kiểm tra trường username
    if (registerNameValue == '') {
        setError(registerName, 'Tên không được để trống');
        isCheck = false;
    } else {
        setSuccess(registerName);
        setError(registerName, '');
    }

    // Kiểm tra trường email
    if (registerEmailValue == '') {
        setError(registerEmail,'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(registerEmailValue)) {
        setError(registerEmail,'Email không đúng định dạng');
        isCheck = false;
    } 
    else {
        setSuccess(registerEmail);
        setError(registerEmail,'');
    }

    // Kiểm tra trường password
    if (registerPasswordValue == '') {
        setError(registerPassword,'Password không được để trống');
        isCheck = false;
    } else if (!validatePassword(registerPasswordValue)) {
        setError(registerPassword,'Password không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(registerPassword);
        setError(registerPassword,'');
    }

    // Kiểm tra trường confirm password
    if (registerConfirmPasswordValue == '') {
        setError(registerConfirmPassword,'Confirm Password không được để trống');
        isCheck = false;
    }else if (registerConfirmPasswordValue != registerPasswordValue) {
        setError(registerConfirmPassword,'Confirm Password không hợp lệ');
        isCheck = false;
    } else {
        setSuccess(registerConfirmPassword);
        setError(registerConfirmPassword,'');
    }
    return isCheck;
}

// validate login
const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');
const btnLogin = document.getElementById('btn-sign-in');

function checkLogin() {
    let loginEmailValue = loginEmail.value;
    let loginPasswordValue = loginPassword.value;
    let isCheck = true;
    // Kiểm tra trường email
    if (loginEmailValue == '') {
        setError(loginEmail,'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(loginEmailValue)) {
        setError(loginEmail,'Email không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(loginEmail);
        setError(loginEmail,'');
    }

    // Kiểm tra trường password
    if (loginPasswordValue == '') {
        setError(loginPassword,'Password không được để trống');
        isCheck = false;
    } else {
        setSuccess(loginPassword);
        setError(loginPassword,'');
    }
    return isCheck;
}

