<?php

require("api.php");

$dbh->followUser(get_logged_in_username(), $_GET["user"]);
$dbh->newNotificationNotPost($_GET["user"], get_logged_in_username(), "F");

?>