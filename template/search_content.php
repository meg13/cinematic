<?php

$movies = $template["movies"];
if (!isset($movies)) {
    die("Movies data not set.");
}

?>

<section class="col-center-only">
    <header>
        <h1>Ricerca</h1>
    </header>
    <form action="#" style="height: 40px; background-color: green;"></form>
    <ul class="movie-list movie-grid">
        <?php
        if (isset($query)) {
            foreach ($movies as $movie) {
                $_GET["movie"] = $movie;
                require("movie_element.php");
            }
        }
        ?>
    </ul>
</section>