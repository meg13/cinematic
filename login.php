<?php 
require_once("bootstrap.php");

$template["title"] = "Login";
$template["content"] = "login_content.php";
$template["login"] = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['email'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        $template["loginError"] = "Please fill both the username and password fields!";
        //exit('Please fill both the username and password fields!');
    }

    if(isset($_POST["email"]) && isset($_POST["password"])){
        if($dbh->logInControl(($_POST["email"]))) {
            $userPassword = $dbh -> getPassword($_POST["email"])[0]['password'];
            if (password_verify($_POST['password'], $userPassword)) {
                //session_start();
                //$_SESSION["username"] = $_POST['username'];
                header('Location: profile.php');
                //echo 'Welcome ' . $_SESSION['name'] . '!';

            }else {
                $template["loginError"] = "Incorrect password!";
                //echo 'Incorrect username and/or password!';
            }
        } else {
            $template["loginError"] = "Incorrect email!";
            //echo 'Incorrect username and/or password!';
        }
    }
}

$template["script"] = "login.js";

require("template/base.php");

?>