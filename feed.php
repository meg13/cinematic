<?php

require_once("bootstrap.php");

$template["title"] = "Feed";
$template["content"] = "feed_content.php";
$template["post"] = $dbh->getFriendsPosts(get_logged_in_username());

require("template/base.php");

?>