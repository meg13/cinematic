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

$template["title"] = "Film";
$template["content"] = "movie_content.php";
$template["movie"] = $movie;

require("template/base.php");

?>