<?php

require_once("bootstrap.php");

$notifications = $dbh->getNotifications("user2");

$template["title"] = "Notifiche";
$template["content"] = "notifications_content.php";
$template["script"] = "notifications.js";
$template["notifications"] = $notifications;

require("template/base.php");

?>