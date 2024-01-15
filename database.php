<?php

class DatabaseHelper{
    private $db;
    
    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function registerUser($username, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $email, $password);
        $stmt->execute();
    }

    public function getFriendsPosts($user) {
        $stmt = $this->db->prepare("SELECT P.body, P.user_id, M.title AS movie_title, P.stars FROM Posts P JOIN Followership ON P.user_id = Followership.followed_user_id WHERE Followership.following_user_id = ? ORDER BY P.date DESC");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserPosts($user) {
        $stmt = $this->db->prepare("SELECT P.body, P.user_id, M.title AS movie_title, P.stars FROM Posts P JOIN Movies M ON P.movie_id = M.movie_id WHERE P.user_id = ? ORDER BY P.date DESC");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function likePost($user, $post) {
        $stmt = $this->db->prepare("INSERT INTO Likes (user_id, post_id) VALUES (?, ?)");
        $stmt->bind_param('si', $user, $post);
        $stmt->execute();
    }

    public function getLikeCount($post) {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS LikesCount FROM Likes WHERE post_id = ?");
        $stmt->bind_param('i', $post);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCommentCount($post) {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS CommentsCount FROM Comments WHERE post_id = ?");
        $stmt->bind_param('i', $post);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostComments($post) {
        $stmt = $this->db->prepare("SELECT C.user_id, C.body, C. FROM Comments C WHERE C.post_id = ?");
        $stmt->bind_param('i', $post);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function writeComment($post, $user, $comment) {
        $stmt = $this->db->prepare("INSERT INTO Comments (post_id, user_id, body) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $post, $user, $comment);
        $stmt->execute();
    }

    public function writePost($user, $body, $movie_id, $stars) {
        $stmt = $this->db->prepare("INSERT INTO Posts (body, user_id, movie_id, stars, date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param('sssi', $body, $user, $movie_id, $stars);
        $stmt->execute();
    }

    public function getWatchlist($user) {
        $stmt = $this->db->prepare("SELECT Movies.* FROM Movies JOIN ToWatch ON Movies.movie_id = ToWatch.movie_id WHERE ToWatch.user_id = ? ORDER BY Movies.title ASC;");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addToWatchlist($user, $movie_id) {
        $stmt = $this->db->prepare("INSERT INTO ToWatch (user_id, movie_id) VALUES (?, ?)");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
    }

    public function deleteFromWatchlist($user, $movie_id) {
        $stmt = $this->db->prepare("DELETE FROM ToWatch WHERE user_id = ? AND movie_id = ?");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();

    }

    public function getWatchedMovies($user) {
        $stmt = $this->db->prepare("SELECT W.movie_id, M.title FROM Watched W JOIN Movies M ON W.movie_id = M.movie_id WHERE W.user_id = ? ORDER BY W.date DESC");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToWatched($user, $movie_id ) {
        $stmt = $this->db->prepare("INSERT INTO Watched (user_id, movie_id, date) VALUES (?, ?, NOW())");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
    }

    public function deleteFromToWatched($user, $movie_id) {
        $stmt = $this->db->prepare("DELETE FROM Watched WHERE user_id = ? AND movie_id = ?");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
    }

    public function isInWatchlist($user, $movie_id) {
        $stmt = $this->db->prepare("SELECT * FROM ToWatch W WHERE W.user_id = ? AND W.movie_id = ?");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    public function isWatched($user, $movie_id) {
        $stmt = $this->db->prepare("SELECT * FROM ToWatch W WHERE W.user_id = ? AND W.movie_id = ?");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    public function getUserBio($user) {
        $stmt = $this->db->prepare("SELECT U.bio FROM Users U WHERE U.username = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function updateBio($user, $bio) {
        $stmt = $this->db->prepare("UPDATE Users SET bio = ? WHERE username = ?");
        $stmt->bind_param('ss', $bio, $user);
        $stmt->execute();
    }

    public function addMovie($movie_id, $title) {
        $stmt = $this->db->prepare("INSERT INTO Movies (movie_id, title) VALUES (?, ?) ON DUPLICATE KEY UPDATE title = VALUES(title)");
        $stmt->bind_param('ss', $movie_id, $title);
        $stmt->execute();
    }

    public function getMoviePost($movie_id){
        $stmt = $this->db->prepare("SELECT P.body, P.user_id, P.stars FROM Posts P JOIN Movies M ON P.movie_id = M.movie_id WHERE M.movie_id = ? ORDER BY P.date DESC");
        $stmt->bind_param('s', $movie_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifications($user) {
        $stmt = $this->db->prepare("SELECT N.responsable_user_id, N.type, N.post_id, N.read  FROM Notifications N WHERE N.receiving_user_id = ? ORDER BY ");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function notificationRead($notif_id) {
        $stmt = $this->db->prepare("UPDATE Notifications N SET N.read = TRUE WHERE N.notif_id = ?");
        $stmt->bind_param('i', $notif_id);
        $stmt->execute();
    }

    public function alreadyRegistered($user) {
        $stmt = $this->db->prepare("SELECT * FROM Users U WHERE U.username = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function logInControl($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM Users U WHERE U.email = ? AND U.password = ?");
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    
    


    

}