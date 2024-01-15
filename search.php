<?php

require_once("bootstrap.php");

$template["title"] = "Ricerca";
$template["content"] = "search_content.php";

$query = $_GET["s"];
if (!isset($query)) {
    die("Search query not set.");
}
$template["movies"] = omdb_search_movies_by_title($query);

require("template/base.php");

?>