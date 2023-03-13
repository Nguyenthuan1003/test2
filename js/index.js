const login = document.querySelector('#login');
const userName = document.querySelector('#user-name');
const password = document.querySelector('#password');
const userNameError = document.querySelector('#user-name_error');
const passwordError = document.querySelector('#password_error');

login.addEventListener('click', (e) => {
    e.preventDefault();
    let err = false;
    userNameError.innerHTML = '';
    passwordError.innerHTML = '';
    if (userName.value.trim() == '') {
        userNameError.innerHTML = 'Vui long nhap ten cua ban';
        err = true;
    }
    if (userName.value.trim() != 'join') {
        userNameError.innerHTML = 'Ten da nhap khong dung';
        err = true;
    }
    if (password.value.trim() == '') {
        passwordError.innerHTML = 'Vui long nhap mat khau cua ban';
        err = true;
    }
    if (password.value.trim() != '1234') {
        passwordError.innerHTML = 'Mat khau da nhap khong dung';
        err = true;
    }
    if (err == false) {
        window.location.href = './dashboard.html';
    }
})