<?php

require("api.php");

$_SESSION["light_theme"] = isset($_GET["light"]) && $_GET["light"] == "true" ?? false;

?>