<?php

require_once("bootstrap.php");

$template["content"] = "profile_content.php";
$template["username"] = get_logged_in_username();
$template["title"] = $template["username"];

require("template/base.php");

?>