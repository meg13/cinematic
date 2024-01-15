<?php

require_once("bootstrap.php");

$movie_id = $_GET["id"];

if (!isset($movie_id)) {
    die("Movie ID not set");
}

$movie = omdb_get_movie_by_id($movie_id);

if (!$movie) {
    die("Invalid ID");
}

$dbh->addMovie($movie->imdbID, $movie->Title);

$template["title"] = "Film";
$template["content"] = "movie_content.php";
$template["movie"] = $movie;
$template["in_watchlist"] = $dbh->isInWatchlist(get_logged_in_username(), $id);
$template["in_watched"] = $dbh->isWatched(get_logged_in_username(), $id);
$template["followed_watched_count"] = $dbh->getNumberOfUserHaveSeenMovie(get_logged_in_username(), $id);

require("template/base.php");

?>