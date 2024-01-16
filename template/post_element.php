<?php
$post = $_GET["post"];
$comments = $dbh->getPostComments($post);
$user_id = get_logged_in_username();
?>
<article class="post" id="<?php echo $post?>">
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
        <form action="api/create_comment.php" method="POST">
            <label for="write-comment" hidden>Scrivi un post</label>
            <textarea id="write-comment" name="write-comment" placeholder="Scrivi un commento..." rows="1"></textarea>
            <input type="submit" value="Invia">
        </form>
    </div>
</article>




