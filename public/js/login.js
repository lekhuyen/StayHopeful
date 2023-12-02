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
    return /^[A-Za-z]\w{7,14}$/.test(password);
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
    }

    // Kiểm tra trường password
    if (loginPasswordValue == '') {
        setError(loginPassword,'Password không được để trống');
        isCheck = false;
    } else {
        setSuccess(loginPassword);
    }
    return isCheck;
}

