<?php

require("api.php");

$username = "test"; // TODO get from session

$dbh->addToWatched($username, $_GET["movieid"]);

?>