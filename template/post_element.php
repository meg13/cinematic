<?php
$post = $_GET["post"];
$comments = $dbh->getPostComments($post);
$user_id = get_logged_in_username();
$is_liked = $dbh -> alreadyLikedPost($user_id, $post);
?>
<article class="post" id="<?php echo $post["post_id"]?>">
    <header>
        <h3><?php echo $post["movie_title"]; ?></h3>
        <div class="stars stars-<?php echo $post["stars"] ?>"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>            
    </header>
    <p><?php echo $post["body"]; ?></p>
    <footer>
        <ul>
            <li>
                <a class="unliked <?php if ($is_liked) echo "liked" ?>">
                <svg></svg>
                <span><?php echo $dbh->getLikeCount($post["post_id"]) ?></span>
                </a>   
            </li>
            <li>
                <a class="comment-button">
                <svg></svg>
                <span><?php echo $dbh->getCommentCount($post["post_id"]) ?></span>
                </a>
            </li>
            <li>
                <p><?php echo $post["user_id"]; ?></p>
            </li>
        </ul>
    </footer>
    <div class="comment-section" style="display: none;">
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




