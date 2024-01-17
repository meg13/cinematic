<?php 
$movie = $_GET["movie_id"];
?>

<article class="write-a-post">
<header>
    <h3>Scrivi un post</h3>
    <?php
    $_GET["stars_filled_amount"] = "application";
    $_GET["role"] = "application";
    require("stars.php")
    ?>
</header>
<form action="api/create_post.php?movie_id=<?php echo $movie?>" method="post">
    <label for="add-comment" hidden>Aggiungi un post</label>
    <textarea id="add-comment" name="add-comment" placeholder="Aggiungi un commento..." rows="4"></textarea>
    <input type="submit" value="Pubblica">
</form>
</article>