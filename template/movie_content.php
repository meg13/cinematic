<?php

$movie = $template["movie"];
if (!isset($movie)) {
    die("Movie not set");
}

require("util/movie_utils.php");
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
                <span><?php echo dateToYear($movie->Released) . " • " . $movie->Runtime ?></span>
                <span lang="en"><?php echo $movie->Genre ?></span>
            </p>
            <div class="stars stars-<?php echo ratingToStars($movie->Metascore) ?>"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>
            <a class="watchlist-add in-watchlist" href="#"
                onclick="toggleClass(this, 'in-watchlist')"><svg></svg>Aggiungi a watchlist</a>
        </div>
    </header>
    <div class="movie-description">
        <p lang="en"><?php echo $movie->Plot ?></p>
        <p class="weak">Regista: <?php echo $movie->Director ?></p>
        <p>Visto da <strong>10</strong> persone che segui</p> <!-- TODO -->
    </div>
    <div class="unwatched"><a href="#" onclick="toggleClass(this.parentElement, 'watched')"><svg></svg>Visto</a></div>
</section>
<section class="col-right">
    <h2>Post</h2>
</section>