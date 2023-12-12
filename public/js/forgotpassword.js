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
    forgotPasswordForm.classList.remove("showForgotPassword");
    containerPopup.classList.add('showLogin');
});
//show reset password form
var sentOtpSuccessfully = document.querySelector('.btn-send-otp-email');
var resetPasswordForm = document.querySelector('.container-reset-password-form');
var exitResetPasswordFormBtn = document.querySelector('.exit-reset-password-form');
var exitResetPasswordForm = document.querySelector('.modal-inner-reset-password-form');
sentOtpSuccessfully.addEventListener('click', function () {
    resetPasswordForm.classList.add("showFormResetPassword");
});
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