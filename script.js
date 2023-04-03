signupVerify = function () {
    let password = document.getElementById("password").value;
    let button = document.getElementById("submit");
    let cPassword = document.querySelector("#cPassword").value;

    if (password === cPassword) {
        button.disabled = false;
        button.classList.add("enabled");
        button.classList.remove("disabled");
    } else {
        button.disabled = true;
        button.classList.remove("enabled");
        button.classList.add("disabled");
    }
}

loginVerify = function() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let button = document.getElementById("submit");
    
    if (password.length > 0 && email.length > 0) {
        button.disabled = false;
        button.classList.add("enabled");
        button.classList.remove("disabled");
    } else {
        button.disabled = true;
        button.classList.add("disabled");
        button.classList.remove("enabled");
    }
}

redirect = function() {
    window.location.href = "./login.html";
}