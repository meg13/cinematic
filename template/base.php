<?php if (!isset($template)) die("Template parameters are not set") ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/desktop.css">
    <link rel="stylesheet" href="css/icons.css">
    <title><?php $template["title"] ?></title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="feed.html"><svg class="home-icon"></svg>Home</a></li>
            <li><a href="search.html"><svg class="search-icon"></svg>Cerca</a></li>
            <li><a href="profile.html"><svg class="profile-icon"></svg>Profilo</a></li>
            <li><a href="notifications.html"><svg class="bell-icon"></svg>Notifiche</a></li>
        </ul>
    </nav>
    
    <?php require($template["content"]) ?>

    <script src="js/script.js"></script>
</body>

</html>