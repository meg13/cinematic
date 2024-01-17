<?php

require_once("bootstrap.php");

$template["title"] = "Feed";
$template["content"] = "feed_content.php";
$template["post"] = $dbh->getFriendsPosts(get_logged_in_username());
$template["friends_watched_movies"] = $dbh -> friendsRecentlyWatched(get_logged_in_username());
$template["script"] = "post.js";
require("template/base.php");

?>