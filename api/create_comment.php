<?php 
if(isset($_POST["write-comment"])){
    $dbh->writeComment($post, $user_id, $_POST["write-comment"]);
}
?>
