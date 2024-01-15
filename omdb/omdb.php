<?php

const API_KEY = "44ade1ff";

const API_ENDPOINT = "http://www.omdbapi.com/?";
const API_KEY_SUFFIX = "&apikey=" . API_KEY;

/**
 * Gets JSON data from omdbapi.com, or `false` if an error occurred.
 */
function omdb_get($params) {
    $content = file_get_contents(API_ENDPOINT . $params . API_KEY_SUFFIX);
    $result = json_decode($content);

    if (isset($result->Error)) {
        return false;
    }

    return $result;
}

function omdb_get_movie_by_title($title) {
    return omdb_get("t=" . $title);
}

function omdb_get_movie_by_id($id) {
    return omdb_get("i=" . $id);
}

function omdb_search_movies_by_title($title) {
    return omdb_get("s=" . $title)->Search;
}

?>