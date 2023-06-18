let url = window.location.href;
const errors = document.querySelector(".errorHandler");

if (url.match("emptyinput")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "Please fill in all the fields!";
} else if (url.match("invalidUsernameOrPassword")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "Invalid Username or Password!";
} else if (url.match("invalidEmail")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "Invalid Email adress!";
} else if (url.match("invalidPwd")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "The passwords does not match!";
} else if (url.match("UsernameAlreadyTaken")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "The username already Taken!";
} else if (url.match("userNotFound")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "The username is not correct!";
} else if (url.match("userNameOrPasswordWrong")) {
    errors.style.display = "flex";
    errors.style.color = "#b61d1d";
    errors.innerHTML = "The username or password is wrong!";
}