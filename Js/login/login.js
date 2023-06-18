function overFlowOn() {
    document.body.style.overflowY = "auto";
    document.getElementById("home").style.display = "none";
}

$(document).ready(function () {
    accountManagment();
    overFlowOn();
})

function accountManagment() {
    let url = window.location.href;
    const errors = document.querySelector(".errorHandler");
    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');

    registerLink.addEventListener('click', () => {
        wrapper.classList.add('active');
        localStorage.setItem('in', registerLink);
    })

    loginLink.addEventListener('click', () => {
        wrapper.classList.remove('active')
        localStorage.removeItem('in', loginLink);
    })

    if (localStorage.getItem('in')) {
        wrapper.classList.add('active');
    } else {
        wrapper.classList.remove('active');
    }

    if (url.match("SuccessfullySignedUp")) {
        errors.style.display = "flex";
        errors.style.color = "green";
        wrapper.classList.remove('active');
        localStorage.removeItem('in', loginLink);
        errors.innerHTML = "Successfully signed up, feel free to login!";
    }
}




