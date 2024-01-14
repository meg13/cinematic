<?php

require_once("bootstrap.php");

$profile = array(
    "username" => "tizio",
    "bio" => "Lorem ipsum dolor sit amet consectetur. Velit in morbi aliquet scelerisque nec fringilla diam tellus sit. Gravida sed convallis orci bibendum. Vehicula tellus volutpat habitant convallis egestas ac arcu. Adictumst risus scelerisque nulla quis.",
); // TODO get from db

$template["title"] = $profile["username"];
$template["content"] = "profile_content.php";
$template["profile"] = $profile;

require("template/base.php");

?>