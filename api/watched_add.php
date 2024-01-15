<?php

require("api.php");

$dbh->addToWatched(get_logged_in_username(), $_GET["movieid"]);

?>