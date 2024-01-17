<?php if (!isset($template)) die("Template parameters are not set") ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <?php if ($template["post"]): ?>
    <link rel="stylesheet" href="css/feedStyle.css">    
    <?php endif ?>
    <?php if ($template["register"]): ?>
    <link rel="stylesheet" href="css/loginStyle.css">    
    <?php endif ?>
    <link rel="stylesheet" href="css/desktop.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/animations.css">
    <title><?php $template["title"] ?></title>
</head>

<body class="dark-theme">
    <nav>
        <ul>
            <li><a href="feed.php"><svg class="home-icon"></svg>Home</a></li>
            <li><a href="search.php"><svg class="search-icon"></svg>Cerca</a></li>
            <li><a href="profile.php"><svg class="profile-icon"></svg>Profilo</a></li>
            <li><a href="notifications.php"><svg class="bell-icon"></svg>Notifiche</a></li>
        </ul>
    </nav>
    
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