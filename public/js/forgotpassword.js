//popup forgot password
var forgotPasswordLink = document.querySelector('.div-forgot-pass');
var forgotPasswordEmailForm = document.querySelector('.container-reset-password-email-input');
var exitSendOtpBtn = document.querySelector('.exit-reset-password-email-input-btn');
var exitSendOtpForm = document.querySelector('.modal-inner-reset-password-email-input');
forgotPasswordLink.addEventListener('click', function () {
    forgotPasswordEmailForm.classList.add("showForgotPassword");
    containerPopup.classList.remove('showLogin');
});
exitSendOtpBtn.addEventListener('click', function () {
    forgotPasswordEmailForm.classList.remove("showForgotPassword");
    containerPopup.classList.add('showLogin');
});
exitSendOtpForm.addEventListener('click', function () {
    forgotPasswordEmailForm.classList.remove("showForgotPassword");
    containerPopup.classList.add('showLogin');
});
//show reset password form
var sentOtpSuccessfully = document.querySelector('.btn-send-otp-email');
var resetPasswordForm = document.querySelector('.container-reset-password-form');
var exitResetPasswordFormBtn = document.querySelector('.exit-reset-password-form');
var exitResetPasswordForm = document.querySelector('.modal-inner-reset-password-form');
// sentOtpSuccessfully.addEventListener('click', function () {
//     resetPasswordForm.classList.add("showFormResetPassword");
// });
exitResetPasswordFormBtn.addEventListener('click', function () {
    resetPasswordForm.classList.remove("showFormResetPassword");
});
exitResetPasswordForm.addEventListener('click', function () {
    resetPasswordForm.classList.remove("showFormResetPassword");
});
//resend otp popup
var linkResendPassword = document.querySelector('.link-resend-otp');
linkResendPassword.addEventListener('click', function () {
    resetPasswordForm.classList.remove("showFormResetPassword");
    forgotPasswordEmailForm.classList.add("showForgotPassword");
});

//validate
const resetPassEmail = document.getElementById('reset-password-email');
const resetPassOtp = document.getElementById('reset-password-otp');
const resetPassNewPass = document.getElementById('new-password-reset');
const resetPassConfirmPass = document.getElementById('confirm-new-password-reset');
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function validatePassword(password) {
    return /^[A-Za-z]\w{5,14}$/.test(password);
}
function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}
function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}

function checkValidateEmailResetPass() {
    let resetPassEmailValue = resetPassEmail.value;
    let isCheck = true;

    // Kiểm tra trường email
    if (resetPassEmailValue == '') {
        setError(resetPassEmail,'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(resetPassEmailValue)) {
        setError(resetPassEmail,'Email không đúng định dạng');
        isCheck = false;
    } 
    else {
        setSuccess(resetPassEmail);
        setError(resetPassEmail,'');
    }
    return isCheck;
}

function checkResetPassword() {
    let resetPassOtpValue = resetPassOtp.value;
    let resetPassNewPassValue = resetPassNewPass.value;
    let resetPassConfirmPassValue = resetPassConfirmPass.value;
    let isCheck = true;
    // Kiểm tra trường otp
    if (resetPassOtpValue == '') {
        setError(resetPassOtp,'This field can not be empty');
        isCheck = false;
    } else {
        setSuccess(resetPassOtp);
        setError(resetPassOtp,'');
    }

    // Kiểm tra trường password
    if (resetPassNewPassValue == '') {
        setError(resetPassNewPass,'Password không được để trống');
        isCheck = false;
    } else if (!validatePassword(resetPassNewPassValue)) {
        setError(resetPassNewPass,'Password không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(resetPassNewPass);
    }
    // Kiểm tra trường confirm password
    if (resetPassConfirmPassValue == '') {
        setError(confirmNewPassword,'Confirm Password không được để trống');
        isCheck = false;
    }else if (resetPassConfirmPassValue != resetPassNewPassValue) {
        setError(confirmNewPassword,'Confirm Password không hợp lệ');
        isCheck = false;
    } else {
        setSuccess(resetPassConfirmPass);
        setError(confirmNewPassword,'');
    }

    return isCheck;
}
