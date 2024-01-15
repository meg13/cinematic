<?php

require("api.php");

$username = "test"; // TODO get from session

$dbh->updateBio($username, $_POST["bio"]);

?>