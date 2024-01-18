<?php

if (!isset($template)) die("Template parameters are not set");

$is_login_page = isset($template["register"]) || isset($template["login"]);

if (!isset($_SESSION["username"])) {
    // Redirect to login if not logged in
    if (!$is_login_page) {
        header('Location: login.php');
    }
} else {
    // Redirect to feed if logged in
    if ($is_login_page) {
        header('Location: feed.php');
    }
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <?php if (isset($template["post"])): ?>
    <link rel="stylesheet" href="css/feedStyle.css">    
    <?php endif ?>
    <?php if (isset($template["register"])): ?>
    <link rel="stylesheet" href="css/loginStyle.css">    
    <?php endif ?>
    <?php if (isset($template["login"])): ?>
    <link rel="stylesheet" href="css/loginStyle.css">    
    <?php endif ?>
    <link rel="stylesheet" href="css/desktop.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/animations.css">
    <title><?php echo $template["title"] ?></title>
</head>

<body <?php if ($_SESSION["light_theme"]) echo 'class="light-theme"' ?> >
    <?php if (!isset($template["noNav"])): ?>
    <nav>
        <ul>
            <li><a href="feed.php"><svg class="home-icon"></svg>Home</a></li>
            <li><a href="search.php"><svg class="search-icon"></svg>Cerca</a></li>
            <li><a href="profile.php"><svg class="profile-icon"></svg>Profilo</a></li>
            <li><a href="notifications.php"><svg class="bell-icon"></svg>Notifiche</a></li>
            <li><a href="#" class="theme-switch">
                <svg role="application">
                    <title>Cambia tema</title>
                </svg>
                Tema
            </a></li>
        </ul>
    </nav>
    <?php endif ?>
    
    <?php require($template["content"]) ?>

    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>

    <?php 
    // Additional scripts
    $script = $template["script"];
    
    if (isset($script)): 
        if (is_array($script)):
            foreach ($script as $s):
    ?>
        <script src="js/<?php echo $s ?>"></script>
    <?php endforeach; else: ?>
        <script src="js/<?php echo $script ?>"></script>
    <?php endif; endif ?>
</body>

</html>