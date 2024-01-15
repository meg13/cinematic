<?php
$post = $_GET["post"];
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
    <div>
        <p>user1</p>
        <p>Lorem ipsum dolor sit amet consectetur. Velit in morbi aliquet scelerisque nec fringilla diam tellus sit. Gravida sed convallis orci bibendum. </p>
    </div>
    <form>
        <label for="write-comment" hidden>Scrivi un post</label>
        <textarea id="write-comment" name="write-comment" placeholder="Scrivi un commento..." rows="1"></textarea>
        <input type="submit" value="Invia">
    </form>
</div>