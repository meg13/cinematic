<?php

require("api.php");

$dbh->deleteFromToWatched(get_logged_in_username(), $_GET["movieid"]);

?>