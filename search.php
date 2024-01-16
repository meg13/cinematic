<?php

require_once("bootstrap.php");

$template["title"] = "Ricerca";
$template["content"] = "search_content.php";
$template["script"] = "search.js";

$query = $_GET["s"];
$template["users"] = isset($query) ? array_column($dbh->searchUsers($query), "username") : array();
$template["movies"] = isset($query) ? omdb_search_movies_by_title($query) : array();

require("template/base.php");

?>