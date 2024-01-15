<?php

require("api.php");

$dbh->deleteFromWatchlist(get_logged_in_username(), $_GET["movieid"]);

?>