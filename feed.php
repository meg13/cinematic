<?php

require_once("bootstrap.php");

$templateParams["titolo"] = "Feed";
$templateParams["content"] = "feed_content.php";
$templateParams["post"] = $dbh->getFriendsPosts($a);
require("template/base.php");

?>