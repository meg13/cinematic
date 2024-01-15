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

    public function writeComment($post, $user, $comment) {
        $stmt = $this->db->prepare("INSERT INTO Comments (post_id, user_id, body) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $post, $user, $comment);
        $stmt->execute();
    }

    public function getWatchlist($user) {
        $stmt = $this->db->prepare("SELECT Movies.* FROM Movies JOIN ToWatch ON Movies.movie_id = ToWatch.movie_id WHERE ToWatch.user_id = ? ORDER BY Movies.title ASC;");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addToWatchlist($user, $movie_id ) {
        $stmt = $this->db->prepare("INSERT INTO ToWatch (user_id, movie_id) VALUES (?, ?)");
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
        $stmt = $this->db->prepare("INSERT INTO Watched (user_id, movie_id) VALUES (?, ?)");
        $stmt->bind_param('ss', $user, $movie_id);
        $stmt->execute();
    }

    public function updateBio($user) {
        $stmt = $this->db->prepare("UPDATE Users SET bio = ? WHERE username = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute();
    }

    private function addMovie($movie_id, $title) {
        $stmt = $this->db->prepare("INSERT INTO Movies (movie_id, title) VALUES (?, ?)");
        $stmt->bind_param('ss', $movie_id, $title);
        $stmt->execute();
    }

}