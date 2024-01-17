<?php

require_once("bootstrap.php");

$notifications = $dbh->getNotifications(get_logged_in_username());

$template["title"] = "Notifiche";
$template["content"] = "notifications_content.php";
$template["notifications"] = $notifications;

require("template/base.php");

?>