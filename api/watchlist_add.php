<?php

require("api.php");

$username = "test"; // TODO get from session

$dbh->addToWatchlist($username, $_GET["movieid"]);

?>