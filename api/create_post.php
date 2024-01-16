<?php 
require("api.php");
$user_id = get_logged_in_username();
$movie_id = $_GET["movie_id"];
$dbh->writePost($user_id, $_POST["write-a-post"], $movie_id, $stars);
?>
