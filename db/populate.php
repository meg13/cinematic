<?php

require_once("bootstrap.php");

$movies = array(
    "tt1375666", // Inception
    "tt0120382", // The Truman Show
    "tt0482571", // The Prestige
    "tt0993846", // The Wolf of Wall Street
    "tt15398776", // Oppenheimer
    "tt0096283", // My Neighbor Totoro
    "tt0145487", // Spider-Man
    "tt0109830", // Forrest Gump
    "tt0795421", // Mamma Mia!
    "tt2582802", // Whiplash
);

$posts = array(
    array("rating" => 5, "text" => "Film straordinario, con una trama avvincente e personaggi ben sviluppati."),
    array("rating" => 5, "text" => "Davvero un bel film, con regia magistrale."),
    array("rating" => 5, "text" => "Senza parole, davvero un capolavoro senza eguali."),
    array("rating" => 5, "text" => "Un film che lascia senza fiato. 5 stelle meritatissime!"),
    array("rating" => 4, "text" => "La trama è intrigante e la regia superba."),
    array("rating" => 4, "text" => "Il film è ben realizzato, interpretazioni notevoli ma alcune scene potevano essere più approfondite."),
    array("rating" => 4, "text" => "Un'esperienza cinematografica apprezzabile, seppur con qualche margine di miglioramento."),
    array("rating" => 3, "text" => "Un film che si posiziona nella media. La trama è abbastanza coinvolgente ma manca di originalità."),
    array("rating" => 3, "text" => "Mi aspettavo di più..."),
    array("rating" => 3, "text" => "Visione carina, ma niente di che."),
    array("rating" => 2, "text" => "Deludente."),
    array("rating" => 2, "text" => "La trama manca di coerenza e le interazioni tra gli attori risultano forzate. Bocciato."),
    array("rating" => 2, "text" => "Trama confusa e recitazione poco coinvolgente."),
    array("rating" => 1, "text" => "Peggior film che abbia mai visto..."),
    array("rating" => 1, "text" => "CHE SCHIFO")
);

$comments = array(
    "Totalmente d'accordo",
    "Grazie mille per questa recensione",
    "Hai catturato la mia curiosità",
    "Grazie per il suggerimento :)",
    "Ottimo, guarderò questo film",
    "Mi hai dato un'idea più chiara sul film",
    "Non sono d'accordo",
    "Mi dispiace ma ti sbagli",
    "Ma che dici...",
    "ahahahaha"
);

function get_random_element($array) {
    return $array[rand(0, count($array) - 1)];
}

echo "Adding movies from OMDb API...";

foreach ($movies as $movie) {
    $dbh->addMovie($movie, omdb_get_movie_by_id($movie)->Title);
}

echo "Populating...";

const USERS_AMOUNT = 9;

for ($i = 1; $i <= USERS_AMOUNT; $i++) {
    echo "Creating user " . $i;

    $username = "user" . $i;
    $dbh->registerUser($username, "user" . $i . "@example.com", "Password" . $i);

    for ($j = 0; $j < 5; $j++) {
        // Watched movies
        $watched_movie = get_random_element($movies);
        if (!$dbh->isWatched($username, $watched_movie)) {
            $dbh->addToWatched($username, $watched_movie);

            // Posts
            $post = get_random_element($posts);
            $dbh->writePost($username, $post["text"], $watched_movie, $post["rating"]);
        }
 
        // Watchlist movies
        $watchlist_movie = get_random_element($movies);
        if (!$dbh->isInWatchlist($username, $watchlist_movie)) {
            $dbh->addToWatchlist($username, $watchlist_movie);
        }
    }
}

$all_posts = $dbh->getAllPosts();

for ($i = 1; $i <= USERS_AMOUNT; $i++) {
    $username = "user" . $i;

    for ($j = 0; $j < 8; $j++) {
        // Follow
        $follow_user = "user" . rand(1, USERS_AMOUNT);
        if ($follow_user != $username && !$dbh->checkFollowUser($username, $follow_user)) {
            $dbh->followUser($username, $follow_user);
            $dbh->newNotificationNotPost($follow_user, $username, "F");
        }

        // Like
        $random_post = get_random_element($all_posts);
        $random_post_id = $random_post["post_id"];

        if (!$dbh->alreadyLikedPost($username, $random_post_id)) {
            $dbh->likePost($username, $random_post_id);
            $dbh->newNotificationForPost($dbh->getPostUser($random_post_id), $username, "L", $random_post_id);

            $random_comment = get_random_element($comments);
            $dbh->writeComment($random_post["post_id"], $username, $random_comment);
            $dbh->newNotificationForPost($dbh->getPostUser($random_post_id), $username, "C", $random_post_id);
        }
    }
}



echo "Complete";

?>