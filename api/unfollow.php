<?php

require("api.php");

$dbh->stopFollowingUser(get_logged_in_username(), $_GET["user"]);

?>