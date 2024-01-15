<?php

require("../bootstrap.php");

$username = "test"; // TODO get from session

$dbh->deleteFromWatchlist($username, $_GET["movieid"]);

?>