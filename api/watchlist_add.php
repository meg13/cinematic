<?php

require("api.php");

$dbh->addToWatchlist(get_logged_in_username(), $_GET["movieid"]);

?>