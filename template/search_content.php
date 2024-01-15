<?php

$movies = $template["movies"];

?>

<section class="col-center-only">
    <header>
        <h1>Ricerca</h1>
    </header>
    <form action="#">
        <label for="s" hidden>Cerca</label>
        <input type="text" id="s" name="s" placeholder="Cerca un film..." rows="1" autofocus <?php if (isset($query)) echo 'value="' . $query . '"' ?> onfocus="moveCursorToEnd(this)"></input>
        <input type="submit" value="Cerca">
    </form>
    <ul class="movie-list movie-grid">
        <?php
        if (isset($movies)) {
            foreach ($movies as $movie) {
                $_GET["movie"] = $movie;
                require("movie_element.php");
            }
        }
        ?>
    </ul>
</section>