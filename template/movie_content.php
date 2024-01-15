<?php

$movie = $template["movie"];
if (!isset($movie)) {
    die("Movie not set");
}

$id = $movie->imdbID;

?>

<section class="col-left">
    <header class="movie-header">
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
            <div class="stars stars-<?php echo rating_to_stars($movie->Metascore) ?>"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>
            <a class="watchlist-add <?php if ($template["in_watchlist"]) echo "in-watchlist" ?>" href="#"
                onclick="toggleWatchlistAdd(this, '<?php echo $id ?>')"><svg></svg>Aggiungi a watchlist</a>
        </div>
    </header>
    <div class="movie-description">
        <p lang="en"><?php echo $movie->Plot ?></p>
        <p class="weak">Regista: <?php echo $movie->Director ?></p>
        <p>Visto da <strong>10</strong> persone che segui</p> <!-- TODO -->
    </div>
    <div class="unwatched <?php if ($template["in_watched"]) echo "watched" ?>"><a href="#" onclick="toggleWatchedAdd(this.parentElement, '<?php echo $id ?>')"><svg></svg>Visto</a></div>
</section>
<section class="col-right">
    <h2>Post</h2>
</section>