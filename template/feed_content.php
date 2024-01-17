<section class="col-left">
    <header>
        <h1>Attività di chi segui</h1>
    </header>
    <section>
        <h2>Visti di recente</h2>
        <ul class="movie-list">
            <?php
            foreach ($template["friends_watched_movies"] as $movie) {
                $_GET["movieid"] = $movie["movie_id"];
                require("movie_element.php");
            }
            ?>
        </ul>
    </section>
</section>
<section class="col-right">
    <h2>Post</h2>
    <?php foreach ($template["post"] as $post){
        $_GET["post"] = $post;
        require("post_element.php");
    }?>
</section>


