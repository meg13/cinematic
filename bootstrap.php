<?php

const DEBUG = false;

if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once("database.php");
require_once("omdb/omdb.php");
require_once("util/movie_utils.php");

$dbh = new DatabaseHelper("localhost", "root", "", "ProgettoWeb");

?>