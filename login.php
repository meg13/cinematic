<?php 
require_once("bootstrap.php");

$template["title"] = "Login";
$template["content"] = "login_content.php";
$template["login"] = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['email'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }

    if(isset($_POST["email"]) && isset($_POST["password"])){
        if($dbh->logInControl(($_POST["email"]))) {
            $userPassword = $dbh -> getPassword($_POST["email"])[0]['password'];
            if (password_verify($_POST['password'], $userPassword)) {
                //session_start();
                //$_SESSION["username"] = $_POST['username'];
                //header('Location: profile.php');
            }
        } else {
            echo 'Incorrect username and/or password!';
        }
    }
}

require("template/base.php");

?>