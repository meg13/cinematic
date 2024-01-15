<?php

require("api.php");

$username = "test"; // TODO get from session

$dbh->deleteFromWatchlist($username, $_GET["movieid"]);

?>