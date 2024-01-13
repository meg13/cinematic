<?php

/**
 * Extracts only the year from a date.
 * e.g. "10 Jul 2023" => 2023.
 */
function dateToYear($date) {
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return 0;
    }
    return date('Y', $timestamp);
}

/**
 * Converts an integer rating between 1 and 100 to an integer value between 1 and 5.
 */
function ratingToStars($rating) {
    return round($rating / 20);
}

?>