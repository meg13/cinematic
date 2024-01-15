<?php

require_once("bootstrap.php");


$templateParams["titolo"] = "Feed";
$templateParams["content"] = "feed_content.php";
$templateParams["post"] = $dbh->getFriendsPosts(/*TO DO*/);
$templateParams["likes"] = $dbh->getLikeCount();
$templateParams["comments"] = $dbh->getCommentCount();

require("template/base.php");

?>