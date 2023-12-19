 //popup alert remove
var exitAlertBtn = document.querySelector('.exit-alert-btn');
var changePasswordSuccess = document.querySelector(".container-change-password-notification");
var errorAlert = document.querySelector(".container-error-notification");
exitAlertBtn.addEventListener('click', function () {
    changePasswordSuccess.classList.remove("showAlert");
    errorAlert.classList.remove("showAlert");
});
changePasswordSuccess.addEventListener('click', function () {
    changePasswordSuccess.classList.remove("showAlert");
});
errorAlert.addEventListener('click', function () {
    errorAlert.classList.remove("showAlert");
});

 // popup profile
 var profileDropdown = document.querySelector('.profile-popup');
 var popupProfile = document.querySelector('.popup-profile');
 var popupProfileMobile = document.querySelector('.popup-profile-mobile');
 var containerPopupProfile = document.querySelector('.popup-profile-container');
 //console.log(containerPopup);
 if(popupProfile){
 popupProfileMobile.addEventListener('click', function () {
    containerPopupProfile.classList.add('showProfileDropdown');
});
 }
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

 // change password form popup 
 var changePasswordBtn = document.querySelector('.change-password');
 var popupChangePassword = document.querySelector('.popup-change-password-container');
 var exitChangePasswordBtn = document.querySelector('.exit-change-password-btn');
 var exitChangePassword = document.querySelector('.modal-inner-change-password');
 changePasswordBtn.addEventListener('click', function () {
     containerPopupProfile.classList.remove('showProfileDropdown');
     popupChangePassword.classList.add('showChangePassword');
 });
 exitChangePasswordBtn.addEventListener('click', function () {
     popupChangePassword.classList.remove('showChangePassword');
     containerPopupProfile.classList.add('showProfileDropdown');
 });
 exitChangePassword.addEventListener('click', function () {
    popupChangePassword.classList.remove('showChangePassword');
    containerPopupProfile.classList.add('showProfileDropdown');
});
 

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

//validate change password form
const oldPassword = document.getElementById('old-password');
const newPassword = document.getElementById('new-password-change');
const confirmNewPassword = document.getElementById('confirm-new-password-change');

function checkChangePassword() {
    let oldPasswordValue = oldPassword.value;
    let newPasswordValue = newPassword.value;
    let confirmNewPasswordValue = confirmNewPassword.value;
    let isCheck = true;
    // Kiểm tra trường email
    if (oldPasswordValue == '') {
        setError(oldPassword,'This field can not be empty');
        isCheck = false;
    } else {
        setSuccess(oldPassword);
        setError(oldPassword,'');
    }

    // Kiểm tra trường password
    if (newPasswordValue == '') {
        setError(newPassword,'Password không được để trống');
        isCheck = false;
    } else if (newPasswordValue == oldPasswordValue) {
        setError(newPassword,'Password mới không được trùng với password cũ');
        isCheck = false;
    }else if (!validatePassword(newPasswordValue)) {
        setError(newPassword,'Password không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(newPassword);
        setError(newPassword,'');
    }

    // Kiểm tra trường confirm password
    if (confirmNewPasswordValue == '') {
        setError(confirmNewPassword,'Confirm Password không được để trống');
        isCheck = false;
    }else if (confirmNewPasswordValue != newPasswordValue) {
        setError(confirmNewPassword,'Confirm Password không hợp lệ');
        isCheck = false;
    } else {
        setSuccess(confirmNewPassword);
        setError(confirmNewPassword,'');
    }

    return isCheck;
}
