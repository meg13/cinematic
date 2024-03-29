<?php

$movie = $template["movie"];
if (!isset($movie)) {
    die("Movie not set");
}

$id = $movie->imdbID;

?>

<section class="col-left">
    <header class="movie-header" id="<?php echo $id ?>">
        <ul class="movie-list">
            <li>
                <div style="background-image: url('<?php echo $movie->Poster ?>'); background-size: cover;"></div>
            </li>
        </ul>
        <div class="col-right">
            <h1><?php echo $movie->Title ?></h1>
            <p>
                <span><?php echo date_to_year($movie->Released) . " • " . $movie->Runtime ?></span>
                <span lang="en"><?php echo $movie->Genre ?></span>
            </p>
            <?php
            $_GET["stars_filled_amount"] = rating_to_stars($movie->Metascore);
            require("stars.php")
            ?>
            <a class="watchlist-add <?php if ($template["in_watchlist"]) echo "in-watchlist" ?>" href="#">
                <svg></svg>Aggiungi a watchlist
            </a>
        </div>
    </header>
    <div class="movie-description">
        <p lang="en"><?php echo $movie->Plot ?></p>
        <p class="weak">Regista: <?php echo $movie->Director ?></p>
        <p>Visto da <strong><?php echo $template["followed_watched_count"] ?></strong> persone che segui</p>
    </div>
    <div class="unwatched <?php if ($template["in_watched"]) echo "watched" ?>">
        <a href="#">
            <svg></svg>Visto
        </a>
    </div>
</section>
<section class="col-right">
    <h2>Post</h2>
    <?php
        $_GET["movie_id"] = $id;
        require("write_post_element.php");

        foreach ($template["posts"] as $post) {
            $_GET["post"] = $post;
            require("post_element.php");
        }
    ?>
</section>