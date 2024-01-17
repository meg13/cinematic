document.addEventListener("DOMContentLoaded", function () {
    const loginError = "<?php echo addslashes($template['loginError']); ?>";
    const wrongCredential = document.getElementById('wrongCredential');
    const errorHeader = document.querySelector(".error-section");
    const password = document.getElementById("password");

    if (loginError !== "") {
        wrongCredential.style.display = 'block';
        errorHeader.classList.add("error");
        password.classList.add("wrong");
    } else {
        wrongCredential.style.display = 'none';
        errorHeader.classList.remove("error");
        password.classList.remove("wrong");
    }
});
