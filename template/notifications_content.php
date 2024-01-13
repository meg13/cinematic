<?php

$notifications = $template["notifications"];
if (!isset($notifications)) {
    die("Notifications not set");
}

?>

<section class="col-center-only">
    <header>
        <h1>Notifiche</h1>
    </header>
    <ul class="notification-list">
        <?php foreach ($notifications as $notification): ?>
        <li><a href="<?php $notification["action"] ?>"><?php echo $notification["text"] ?></a></li>
        <?php endforeach ?>
    </ul>
</section>