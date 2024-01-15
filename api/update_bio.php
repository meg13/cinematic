<?php

require("api.php");

$dbh->updateBio(get_logged_in_username(), $_POST["bio"]);

?>