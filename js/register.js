document.addEventListener("DOMContentLoaded", function () {
    var errorRegistration = "<?php echo $template['errorRegistration']; ?>";
    var wrongCredential = document.getElementById('wrongCredential');

    if (errorRegistration) {
        wrongCredential.style.display = 'inline-block';
    }
});
