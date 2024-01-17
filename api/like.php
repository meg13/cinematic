<?php
require("api.php");
$user_id = get_logged_in_username();
$post_id = $_GET["post_id"];
$dbh->likePost($user_id, $post_id);
$receiving_user_id = $dbh -> getPostUser($post_id);
$dbh->newNotificationForPost($receiving_user_id, get_logged_in_username(), "L", $post_id);
?>