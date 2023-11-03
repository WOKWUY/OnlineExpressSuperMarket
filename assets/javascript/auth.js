let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmpassword = document.getElementById("confirmpassword");
let error_confirm = document.getElementById("error-confirm");
var isValid = true;
function validateRegister(){
    if(username.value == 0){
        username.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        username.style.borderColor = '#c5c5c5';
    }
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        email.style.borderColor = '#c5c5c5';
    }
    
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        password.style.borderColor = '#c5c5c5';
    }
    
    if(confirmpassword.value == 0){
        confirmpassword.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        confirmpassword.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not fully entered information!',
        });
    }else{
        if(password.value !== confirmpassword.value){
            isValid = false;
            error_confirm.innerHTML = "Password incorrect";
        }
    }
    return isValid;
}

function validateLogin(){
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        email.style.borderColor = '#c5c5c5';
        isValid = true;
    }
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        password.style.borderColor = '#c5c5c5';
        isValid = true;
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not fully entered information!',
        });
    }
    return isValid;
}

function validateForgotPassword(){
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        email.style.borderColor = '#c5c5c5';
        isValid = true;
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not fully entered information!',
        });
    }
    return isValid;
}

function validateNewPassword(){
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        password.style.borderColor = '#c5c5c5';
    }
    
    if(confirmpassword.value == 0){
        confirmpassword.style.borderColor = 'red';
        isValid = false;
    }else{
        isValid = true;
        confirmpassword.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not fully entered information!',
        });
    }else{
        if(password.value !== confirmpassword.value){
            isValid = false;
            error_confirm.innerHTML = "Password incorrect";
        }
    }
    return isValid;
}