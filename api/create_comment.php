<?php 
require("api.php");
$post_id = $_GET["post_id"];
$receiving_user_id = $_GET["comment_author"];
$dbh->writeComment($receiving_user_id, get_logged_in_username(),"C");
?>
