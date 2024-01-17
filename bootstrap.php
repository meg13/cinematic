<?php

$debug = $_GET["debug"] ?? false;

ini_set('display_errors', 0);

if ($debug) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
}

require_once("database.php");
require_once("omdb/omdb.php");
require_once("util/movie_utils.php");

$dbh = new DatabaseHelper("localhost", "root", "", "ProgettoWeb");

session_start();

function get_logged_in_username() {
    return $_SESSION["username"];
}
?>