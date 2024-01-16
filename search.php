<?php

require_once("bootstrap.php");

$template["title"] = "Ricerca";
$template["content"] = "search_content.php";

$query = $_GET["s"];
$template["users"] = array("user1", "user2", "user3"); // TODO query
$template["movies"] = omdb_search_movies_by_title($query);

require("template/base.php");

?>