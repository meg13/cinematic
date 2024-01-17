document.addEventListener("DOMContentLoaded", function () {
    const errorRegistration = "<?php echo $template['errorRegistration']; ?>";
    const wrongCredential = document.getElementById('wrongCredential');

    if (errorRegistration) {
        wrongCredential.style.display = 'inline-block';
    }
});
