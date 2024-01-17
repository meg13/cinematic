<?php 

require_once("bootstrap.php");

$template["title"] = "Register";
$template["content"] = "register_content.php";
$template["noNav"]=true;
$template["register"] = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        $template["errorRegistration"] = "Please complete the registration form!";
        
    } else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        $template["errorRegistration"] = "Please complete the registration form! One or more values are empty";
        
    } else if($dbh->usernameAlreadyRegistered($_POST['username'])) {
        // Username already exists
        $template["errorRegistration"] = "Username already exists, please choose another!";

    } else if($dbh->emailAlreadyRegistered($_POST['email'])) {
        // Email already exists
        $template["errorRegistration"] = "Email already exists, please choose another!";

    } else if (isset($_POST['username'], $_POST['password'], $_POST['email'])){
        $dbh->registerUser($_POST['username'], $_POST['email'], $_POST['password']);
        session_start();
        $_SESSION["username"] = $_POST['username'];
        header('Location: profile.php');
    }
}

require("template/base.php");

?>

