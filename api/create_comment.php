<?php 
require("api.php");
$dbh->writeComment($post, $user_id, $_POST["write-comment"]);
?>
