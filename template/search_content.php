<?php

$users = $template["users"];
$movies = $template["movies"];

?>

<section class="col-center-only">
    <header>
        <h1>Ricerca</h1>
    </header>
    <form action="#">
        <label for="s" hidden>Cerca</label>
        <input type="text" id="s" name="s" placeholder="Cerca film e utenti..." rows="1" autofocus <?php if (isset($query)) echo 'value="' . $query . '"' ?> onfocus="moveCursorToEnd(this)"></input>
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
    <ul class="users-list">
        <?php foreach ($users as $username): ?>
            <li>
                <a href="profile.php?user=<?php echo $username ?>">
                    <svg></svg><?php echo $username?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</section>