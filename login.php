<?php 
require_once("bootstrap.php");

$template["title"] = "Login";
$template["noNav"]=true;
$template["login"] = true;
$template["content"] = "login_content.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['email'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        $template["loginError"] = "Uno o più campi sono vuoti";
        //exit('Please fill both the username and password fields!');
    } else if (empty($_POST['email']) || empty($_POST['password'])) {
        // One or more values are empty.
        $template["loginError"] = "Uno o più campi sono vuoti";
        
    } else if(isset($_POST["email"]) && isset($_POST["password"])){
        if($dbh->logInControl(($_POST["email"]))) {
            $userPassword = $dbh -> getPasswordAndUsername($_POST["email"])[0]['password'];
            $username = $dbh -> getPasswordAndUsername($_POST["email"])[0]['username'];
            if (password_verify($_POST['password'], $userPassword)) {
                $_SESSION["username"] = $username;
                header('Location: feed.php');

            }else {
                $template["loginError"] = "Credenziali errate";
            }
        } else {
            $template["loginError"] = "Credenziali errate";
        }
    }
}

require("template/base.php");

?>