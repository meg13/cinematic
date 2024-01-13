<?php

/**
 * Extracts only the year from a date.
 * e.g. "10 Jul 2023" => 2023.
 */
function date_to_year($date) {
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return 0;
    }
    return date('Y', $timestamp);
}

/**
 * Converts an integer rating between 1 and 100 to an integer value between 1 and 5.
 */
function rating_to_stars($rating) {
    return round($rating / 20);
}

function movie_from_id($id) {
    if (!isset($id)) {
        die("Movie ID not set");
    }
    
    $movie = omdb_get_movie_by_id($id);
    
    if (!$movie) {
        die("Invalid ID");
    }

    return $movie;
}

?>