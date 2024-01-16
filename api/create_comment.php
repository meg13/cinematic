<?php 
require("api.php");
$post_id = $_GET["post_id"];
$dbh->writeComment($post_id, get_logged_in_username(), $_POST["write-comment"]);
?>
