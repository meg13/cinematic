<?php

require_once("bootstrap.php");

$notifications = array(
    array("action" => "#", "text" => "username ha iniziato a seguirti"),
    array("action" => "#", "text" => "username ha iniziato a seguirti"),
    array("action" => "#", "text" => "A username piace il tuo post"),
    array("action" => "#", "text" => "A username piace il tuo post")
); // TODO get from db

$template["title"] = "Notifiche";
$template["content"] = "notifications_content.php";
$template["notifications"] = $notifications;

require("template/base.php");

?>