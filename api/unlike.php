<?php
require("api.php");
$user_id = get_logged_in_username();
$post_id = $_GET["post_id"];
$dbh->unlikePost($user_id, $post_id);
?>