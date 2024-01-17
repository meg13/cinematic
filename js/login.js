document.addEventListener("DOMContentLoaded", function () {
    const errorRegistration = "<?php echo $template['loginError']; ?>";
    const wrongCredential = document.getElementById('wrongCredential');
    const errorHeader = document.querySelector("header.error");
    const password = document.getElementById("password")

    if (errorRegistration) {
        wrongCredential.style.display = 'inline-block';
        errorHeader.classList.add("error");
        password.classList.add("wrong");
    } else {
        wrongCredential.style.display = 'none';
        errorHeader.classList.remove("error");
        password.classList.remove("wrong");
    }
});
