<?php

require_once("bootstrap.php");

$username = get_logged_in_username();

$template["title"] = $username;
$template["content"] = "profile_content.php";
$template["username"] = $username;
$template["bio"] = $dbh->getUserBio($username)["bio"] ?? "";
$template["watched_movies"] = $dbh->getWatchedMovies($username);
$template["watchlist_movies"] = $dbh->getWatchlist($username);

require("template/base.php");

?>