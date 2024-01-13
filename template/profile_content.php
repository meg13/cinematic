<?php

$profile = $template["profile"];
if (!isset($profile)) {
    die("Profile not set");
}

?>

<section class="col-left">
    <header>
        <h1><?php echo $profile["username"] ?></h1>
        <a class="follow" href="#" onclick="toggleClass(this, 'following', 'Following', 'Follow')">Follow</a>
    </header>
    <div class="bio">
        <p><?php echo $profile["bio"] ?></p>
        <p><strong>10</strong> followers</p>
        <p><strong>10</strong> seguiti</p>
    </div>
    <section>
        <h2>Visti</h2>
        <ul class="movie-list">
            <?php $_GET["movieid"] = "tt1375666"; require("movie_element.php") ?>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
        </ul>
    </section>
    <section>
        <h2>Da vedere</h2>
        <ul class="movie-list">
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
            <li>
                <div></div>
                <p>Titolo Film</p>
            </li>
        </ul>
    </section>
</section>
<section class="col-right">
    <h2>Post</h2>
</section>