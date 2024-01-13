<?php

$id = $_GET["movieid"];
$movie = movie_from_id($id);

?>

<li>
    <a href="movie.php?id=<?php echo $id ?>">
        <div style="background-image: url('<?php echo $movie->Poster ?>'); background-size: cover;"></div>
        <p><?php echo $movie->Title ?></p>
    </a>
</li>