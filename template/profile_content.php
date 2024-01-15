<?php

$profile = $template["profile"];
if (!isset($profile)) {
    die("Profile not set");
}

// TODO check if $profile is the same as logged user
$is_self = true;

?>

<section class="col-left">
    <header>
        <h1>
            <?php echo $profile["username"] ?>
        </h1>
        <?php if ($is_self): ?>
            <a class="edit" href="#" onclick="toggleBioEdit(this)">Modifica</a>
        <?php else: ?>
            <a class="follow" href="#" onclick="toggleFollow(this)">Segui</a>
        <?php endif ?>
    </header>
    <div class="bio">
        <p>
            <?php echo $dbh->getUserBio($profile["username"])["bio"] ?? "" ?>
        </p>
        <p><strong>10</strong> followers</p>
        <p><strong>10</strong> seguiti</p>
    </div>
    <section>
        <h2>Visti</h2>
        <ul class="movie-list">
            <?php $_GET["movieid"] = "tt1375666";
            require("movie_element.php") ?>
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