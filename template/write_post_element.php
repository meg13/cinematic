<?php 
$movie = $_GET["movie_id"];
?>

<article class="write-a-post">
<header>
    <h3>Scrivi un post</h3>
    <div class="stars"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>            
</header>
<form action="api/create_post.php?movie_id=<?php echo $movie?>" method="POST">
    <label for="add-comment" hidden>Aggiungi un post</label>
    <textarea id="add-comment" name="add-comment" placeholder="Aggiungi un commento..." rows="4"></textarea>
    <input type="submit" value="Pubblica">
</form>
</article>