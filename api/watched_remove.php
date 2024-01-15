<?php

require("api.php");

$username = "test"; // TODO get from session

$dbh->deleteFromToWatched($username, $_GET["movieid"]);

?>