<?php

$username = $template["username"];
if (!isset($username)) {
    die("Username not set");
}

?>

<section class="col-left">
    <header>
        <h1>
            <?php echo $username ?>
        </h1>
        <?php if ($template["is_self"]): ?>
            <a class="edit" href="#">Modifica</a>
        <?php else: ?>
            <a class="follow <?php if ($template["is_following"]) echo "following" ?>" href="#">
                <?php echo $template["is_following"] ? "Seguito" : "Segui" ?>
            </a>
        <?php endif ?>
    </header>
    <div class="bio">
        <p>
            <?php echo $template["bio"] ?>
        </p>
        <p><strong id="follower-count"><?php echo $template["follower_count"] ?></strong> followers</p>
        <p><strong id="followed-count"><?php echo $template["followed_count"] ?></strong> seguiti</p>
    </div>
    <?php if (!empty($template["watched_movies"])): ?>
    <section>
        <h2>Visti</h2>
        <ul class="movie-list">
            <?php
            foreach ($template["watched_movies"] as $movie) {
                $_GET["movieid"] = $movie["movie_id"];
                require("movie_element.php");
            }
            ?>
        </ul>
    </section>
    <?php endif; if (!empty($template["watchlist_movies"])): ?>
    <section>
        <h2>Da vedere</h2>
        <ul class="movie-list">
            <?php
            foreach ($template["watchlist_movies"] as $movie) {
                $_GET["movieid"] = $movie["movie_id"];
                require("movie_element.php");
            }
            ?>
        </ul>
    </section>
    <?php endif ?>
</section>
<section class="col-right">
    <h2>Post</h2>
    <?php
        foreach ($template["posts"] as $post) {
            $_GET["post"] = $post;
            require("post_element.php");
        }
    ?>
</section>