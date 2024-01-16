<?php
$post = $_GET["post"];
$comments = $dbh->getPostComments($post);
$user_id = $_SESSION["user_id"];

if(isset($_POST["write-comment"])){
    $dbh->writeComment($post, );
    $dbh->writeComment($post, $user_id, $_POST["write-comment"]);
}

?>

<header>
    <h3><?php echo $post["movie_title"]; ?></h3>
    <div class="stars stars-<?php echo $post["stars"] ?>"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>            
</header>
<p><?php echo $post["body"]; ?></p>
<footer>
    <ul>
        <li class="unliked">
            <svg></svg>
            <span><?php echo $dbh->getLikeCount($post["post_id"]) ?></span>
        </li>
        <li class="comment-button">
            <svg></svg>
            <span><?php echo $dbh->getLikeCount($post["post_id"]) ?></span>
        </li>
        <li>
            <p><?php echo $post["user_id"]; ?></p>
        </li>
    </ul>
</footer>
<div class="comment-section" > <!-- style="display: none;" -->
    <hr>
    <?php foreach ($comments as $comment) : ?>
        <div>
            <p><?php echo $comment["user_id"]; ?></p>
            <p><?php echo $comment["body"]; ?></p>
        </div>
    <?php endforeach; ?>
    <form action="#" method="POST">
        <label for="write-comment" hidden>Scrivi un post</label>
        <textarea id="write-comment" name="write-comment" placeholder="Scrivi un commento..." rows="1"></textarea>
        <input type="submit" value="Invia">
    </form>
</div>




