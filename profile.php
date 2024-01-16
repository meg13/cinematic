<?php

require_once("bootstrap.php");

$username = $_GET["user"] ?? get_logged_in_username();

$template["title"] = $username;
$template["content"] = "profile_content.php";
$template["username"] = $username;
$template["bio"] = $dbh->getUserBio($username)["bio"] ?? "";
$template["watched_movies"] = $dbh->getWatchedMovies($username);
$template["watchlist_movies"] = $dbh->getWatchlist($username);
$template["followed_count"] = $dbh->getFollowedNumber($username);
$template["follower_count"] = $dbh->getFollowerNumber($username);

// Whether this is the user's own page (case insensitive comparison)
$is_self = strcasecmp($username, get_logged_in_username()) == 0;
$template["is_self"] = $is_self;

if (!$is_self) {
    $template["is_following"] = false; // TODO
}

require("template/base.php");

?>