<?php 

require_once("bootstrap.php");

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if($dbh->alreadyRegistered($_POST['username'])) {
    // Username already exists
		echo 'Username exists, please choose another!';
} else {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}



?>

