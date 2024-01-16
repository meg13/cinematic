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
            <a class="edit" href="#" onclick="toggleBioEdit(this)">Modifica</a>
        <?php else: ?>
            <a class="follow <?php if ($template["is_following"]) echo "following" ?>" href="#" onclick="toggleFollow(this, '<?php echo $username ?>')">
                Segui
            </a>
        <?php endif ?>
    </header>
    <div class="bio">
        <p>
            <?php echo $template["bio"] ?>
        </p>
        <p><strong><?php echo $template["follower_count"] ?></strong> followers</p>
        <p><strong><?php echo $template["followed_count"] ?></strong> seguiti</p>
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
</section>