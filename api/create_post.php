<?php 
require("api.php");
$user_id = get_logged_in_username();
$movie_id = $_GET["movie_id"];
$dbh->writePost($user_id, $_POST["add-comment"], $movie_id, $_GET["rating"]);
?>