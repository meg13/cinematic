<?php 

require_once("bootstrap.php");

$template["title"] = "Register";
$template["content"] = "register_content.php";
$template["noNav"]=true;
$template["register"] = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        $template["errorRegistration"] = "Uno o più campi sono vuoti";
        
    } else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        $template["errorRegistration"] = "Uno o più campi sono vuoti";
        
    } else if($dbh->usernameAlreadyRegistered($_POST['username'])) {
        $template["errorRegistration"] = "Questo username è già in uso";

    } else if($dbh->emailAlreadyRegistered($_POST['email'])) {
        $template["errorRegistration"] = "Questa email è già in uso";

    } else if (isset($_POST['username'], $_POST['password'], $_POST['email'])){
        $dbh->registerUser($_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION["username"] = $_POST['username'];
        header('Location: profile.php');
    }
}

require("template/base.php");

?>

