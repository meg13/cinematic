<?php

// If present, use movie data. Otherwise, retrieve it.
$movie = $_GET["movie"];
if (!isset($movie)) {
    $id = $_GET["movieid"];
    $movie = movie_from_id($id);
}

?>

<li>
    <a href="movie.php?id=<?php echo $movie->imdbID ?>">
        <div style="background-image: url('<?php echo $movie->Poster ?>'); background-size: cover;"></div>
        <p><?php echo $movie->Title ?></p>
    </a>
</li>