<?php 

require_once("bootstrap.php");

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    $template["errorRegistration"] = "Please complete the registration form!";
    //exit('Please complete the registration form!');
} else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    $template["errorRegistration"] = "Please complete the registration form!";
    //exit('Please complete the registration form');
} else if($dbh->alreadyRegistered($_POST['username'])) {
    // Username already exists
    $template["errorRegistration"] = "Username exists, please choose another!";
		//echo 'Username exists, please choose another!';
} else {
    $dbh->registerUser($_POST['username'], $_POST['email'], $_POST['password']);
}

?>

