<?php

$friends_movies = $template["friends_watched_movies"];
$posts = $template["post"];

?>

<section class="col-left">
    <header>
        <h1>Attività di chi segui</h1>
    </header>
    <section>
        <h2>Visti di recente</h2>
        <?php if (empty($friends_movies)): ?>
            <p>Nessun contenuto da mostrare. Prova a seguire altri utenti!</p>
        <?php endif ?>
        <ul class="movie-list">
            <?php
            foreach ($friends_movies as $movie) {
                $_GET["movieid"] = $movie["movie_id"];
                require("movie_element.php");
            }
            ?>
        </ul>
    </section>
</section>
<section class="col-right">
    <h2>Post</h2>
    <?php if (empty($friends_movies)): ?>
        <p>Non ci sono nuovi post.</p>
    <?php endif ?>
    <?php foreach ($posts as $post) {
        $_GET["post"] = $post;
        require("post_element.php");
    }?>
</section>


